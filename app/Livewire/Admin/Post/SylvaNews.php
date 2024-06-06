<?php

namespace App\Livewire\Admin\Post;

use App\Models\PostModel;
use App\Models\TagModel;
use App\Traits\FileProcess;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class SylvaNews extends Component
{
    use WithFileUploads, FileProcess;

    /**
     * @description : form
     */
    public string $type = '';
    public string $title = '';
    public string $slug = '';
    public array $tags = [];
    public string $content = '';
    public $image;
    public string $status = 'public';
    public string $student_name = '';
    public string $student_year = '';
    public string $search = '';
    public string $filterStatus = '';
    public string $filterTag = '';
    public string $selectedTag = '';

    /**
     * @description : other
     */
    public string $titleModal = 'Tambah Kabar Sylva';
    public string $dataModal = 'create-article-modal';
    public array $tableHead = [
        'title' => 'Judul',
        'tags' => 'Tag',
        'status' => 'Status',
        'student_name' => 'Nama Mahasiswa',
        'student_year' => 'Angkatan',
    ];
    public string $submitMethod = 'store';
    public bool $isEditMode = false;
    public bool $isViewMode = false;
    public PostModel $post;

    public function render()
    {
        $search = $this->search;
        $filterStatus = $this->filterStatus;
        $filterTag = $this->filterTag;

        $articles = PostModel::query()
            ->when(!empty($search), function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('student_name', 'like', "%{$search}%")
                    ->orWhere('student_year', 'like', "%{$search}%");
            })
            ->when(!empty($filterStatus), fn ($q) => $q->where('status', $filterStatus))
            ->when(!empty($filterTag), fn ($q) => $q->whereRaw("JSON_SEARCH(tags, 'all', ?) IS NOT NULL", ["%{$filterTag}%"]))
            ->where('type', PostModel::TYPE_SYLVA_NEWS)
            ->orderBy('updated_at', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('livewire.admin.post.sylva-news')
            ->with([
                'articles' => $articles,
                'tagList' => TagModel::query()->get(),
                'statusList' => PostModel::getStatuses(),
            ]);
    }

    public function rules(PostModel $post = null): array
    {
        $rule_slug = $post === null ?
            ['required', 'string', 'max:255', Rule::unique('posts')] :
            ['required', 'string', 'max:255', Rule::unique('posts')->ignore($post->id)];

        return [
            'title' => ['required', 'string', 'max:255'],
            'slug' => $rule_slug,
            'tags' => ['nullable', 'array'],
            'tags.*' => ['nullable', 'string'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3072'],
            'status' => ['required', 'string'],
            'student_name' => ['required', 'string', 'max:255'],
            'student_year' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . (date('Y')+1)],
        ];
    }

    public function store(): void
    {
        $this->type = PostModel::TYPE_SYLVA_NEWS;
        $this->slug = Str::slug($this->title);
        $this->status = empty($this->status) || $this->status === 'private' ? 'private' : 'public';

        $validated = $this->validate($this->rules(), [
            'slug.unique' => 'The title has already been taken.'
        ]);
        $validated['image'] = $this->storeFile($validated['image'], $this->type, $this->slug);

        PostModel::query()->create([
            'type' => $this->type,
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'tags' => json_encode($validated['tags']),
            'content' => $validated['content'],
            'image' => $validated['image'],
            'status' => $validated['status'],
            'student_name' => $validated['student_name'],
            'student_year' => $validated['student_year'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        $this->redirectRoute('admin.post.sylva-news');
    }

    public function update(): void
    {
        $this->slug = Str::slug($this->title);
        $this->tags = array_values(array_map(function ($tag) {
            return is_array($tag) ? $tag['code'] : $tag;
        }, $this->tags));
        if(is_string($this->image))
            $this->image = null;

        $this->status = empty($this->status) || $this->status === 'private' ? 'private' : 'public';

        $validated = $this->validate($this->rules($this->post), [
            'slug.unique' => 'The title has already been taken.'
        ]);
        $validated['image'] = $this->updateFile($validated['image'], $this->type, $this->post, 'image', $this->slug);

        $this->post->title = $validated['title'];
        $this->post->slug = $validated['slug'];
        $this->post->tags = json_encode($validated['tags']);
        $this->post->content = $validated['content'];
        $this->post->image = $validated['image'];
        $this->post->status = $validated['status'];
        $this->post->student_name = $validated['student_name'];
        $this->post->student_year = $validated['student_year'];
        $this->post->updated_by = auth()->user()->id;
        $this->post->save();

        $this->redirectRoute('admin.post.sylva-news');
    }

    public function delete(PostModel $post): void
    {
        $this->deleteFile($post, 'image');
        $post->delete();

        $this->redirectRoute('admin.post.sylva-news');
    }

    public function showViewModal(PostModel $post): void
    {
        $this->submitMethod = '';
        $this->titleModal = 'Lihat Kabar Sylva';
        $this->isViewMode = true;

        $this->fillVariable($post);
    }

    public function showEditModal(PostModel $post): void
    {
        $this->submitMethod = 'update';
        $this->titleModal = 'Edit Kabar Sylva';
        $this->isEditMode = true;

        $this->fillVariable($post);
    }

    private function fillVariable(PostModel $post): void
    {
        $this->type = $post->type;
        $this->title = $post->title;
        $this->tags = $post->tags;
        $this->content = $post->content;
        $this->image = $post->image;
        $this->status = $post->status;
        $this->student_name = $post->student_name;
        $this->student_year = $post->student_year;
        $this->post = $post;
    }

    public function addTag(): void
    {
        if(!in_array($this->selectedTag, $this->tags)) {
            $this->tags[] = $this->selectedTag;
            $this->reset('selectedTag');
        }
    }

    public function removeTag(int $index): void
    {
        unset($this->tags[$index]);
        $this->tags = array_values($this->tags);
    }

    public function getTextSelectedTags($tagSelected): string
    {
        $tag = TagModel::query()->where('code', $tagSelected)->first();

        return $tag['name'];
    }

    /**
     * @description : default resetting all form
     */
    #[On('resetForm')]
    public function resetForm(): void
    {
        $this->reset();
        $this->resetValidation();
    }
}
