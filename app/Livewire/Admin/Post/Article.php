<?php

namespace App\Livewire\Admin\Post;

use App\Models\PostModel;
use App\Models\UserModel;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Attributes\On;

class Article extends Component
{
    /**
     * @description : form
     */
    public string $type = '';
    public string $title = '';
    public string $slug = '';
    public string $tags = '';
    public string $content = '';
    public string $image = '';
    public bool $is_public = true;
    public string $student_name = '';
    public string $student_year = '';
    public string $search = '';

    /**
     * @description : other
     */
    public string $titleModal = 'Tambah Artikel';
    public string $dataModal = 'create-article-modal';
    public array $tableHead = ['name' => 'Name', 'username' => 'Username'];
    public string $submitMethod = 'store';
    public bool $isEditMode = false;
    public bool $isViewMode = false;
    public PostModel $post;

    public function render()
    {
        $search = $this->search;
        $articles = PostModel::query()
            ->where('type', PostModel::TYPE_ARTICLE)
            ->paginate(10)
            ->withQueryString();

        return view('livewire.admin.post.article')->with(['articles' => $articles]);
    }

    public function rules(PostModel $post = null): array
    {
        return [

        ];
    }

    public function store(): void
    {
        $validated = $this->validate($this->rules());

        PostModel::query()->create([
            'type' => $validated['type'],
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'tags' => $validated['tags'],
            'content' => $validated['content'],
            'image' => $validated['image'],
            'is_public' => $validated['is_public'],
            'student_name' => $validated['student_name'],
            'student_year' => $validated['student_year'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        $this->redirectRoute('admin.post.article');
    }

    public function update(): void
    {
        $validated = $this->validate($this->rules($this->user));

        $this->post->type = $validated['type'];
        $this->post->title = $validated['title'];
        $this->post->slug = Str::slug($validated['title']);
        $this->post->tags = $validated['tags'];
        $this->post->content = $validated['content'];
        $this->post->image = $validated['image'];
        $this->post->is_public = $validated['is_public'];
        $this->post->student_name = $validated['student_name'];
        $this->post->student_year = $validated['student_year'];
        $this->post->updated_by = auth()->user()->id;
        $this->post->save();

        $this->redirectRoute('admin.post.article');
    }

    public function delete(PostModel $post): void
    {
        $post->delete();

        $this->redirectRoute('admin.post.article');
    }

    public function showViewModal(PostModel $post): void
    {
        $this->submitMethod = '';
        $this->titleModal = 'Lihat Artikel';
        $this->isViewMode = true;

        $this->fillVariable($post);
    }

    public function showEditModal(PostModel $post): void
    {
        $this->submitMethod = 'update';
        $this->titleModal = 'Edit Artikel';
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
        $this->is_public = $post->is_public;
        $this->student_name = $post->student_name;
        $this->student_year = $post->student_year;
        $this->post = $post;
    }

    /**
    * @description : default resetting all form
    */
    #[On('resetForm')]
    public function resetForm(): void
    {
        $this->reset();
    }
}
