<?php

namespace App\Livewire\Admin\Post;

use App\Models\AlbumModel;
use App\Traits\FileProcess;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;

class Album extends Component
{
    use WithFileUploads, FileProcess;

    /**
     * @description : form
     */
    public string $title = '';
    public string $description = '';
    public $image;
    public bool $is_public = true;
    public string $search = '';

    /**
     * @description : other
     */
     public string $titleModal = 'Tambah Album';
     public string $dataModal = 'create-album-modal';
     public array $tableHead = ['title' => 'Judul', 'description' => 'Deskripsi', 'image' => 'Gambar', 'updated_at' => 'Terakhir Update'];
     public string $submitMethod = 'store';
     public bool $isEditMode = false;
     public bool $isViewMode = false;
     public AlbumModel $album;

    /**
     * @override method boot
     * @return void
     */
    public function boot(): void
    {
        //Validate Image Required
        $this->withValidator(function ($validator) {
            $validator->after(function ($validator) {
                if ($this->image === null && $this->submitMethod === 'store') {
                    $validator->errors()->add('image', 'The image field is required.');
                };
                if (AlbumModel::query()->count() >= 9) {
                    $validator->errors()->add('is_public', 'The public album must least than 9.');
                };
            });
        });
    }

    public function render()
    {
        $search = $this->search;

        $albums = AlbumModel::query()
            ->when(!empty($search), function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%");
            })
            ->orderBy('updated_at', 'DESC')
            ->paginate(10)
            ->withQueryString();

        return view('livewire.admin.post.album')->with(['albums' => $albums]);
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3072'],
            'is_public' => ['required', 'boolean']
        ];
    }

    public function store(): void
    {
        $validated = $this->validate($this->rules());
        $validated['image'] = $this->storeFile($validated['image'], 'album');

        AlbumModel::query()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $validated['image'],
            'is_public' => $validated['is_public'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        $this->redirectRoute('admin.post.album');
    }

    public function update(): void
    {
        if(is_string($this->image))
            $this->image = null;

        $validated = $this->validate($this->rules());
        $validated['image'] = $this->updateFile($validated['image'], 'album', $this->album, 'image');

        $this->album->title = $validated['title'];
        $this->album->description = $validated['description'];
        $this->album->image = $validated['image'];
        $this->album->is_public = $validated['is_public'];
        $this->album->updated_by = auth()->user()->id;
        $this->album->save();

        $this->redirectRoute('admin.post.album');
    }

    public function delete(AlbumModel $album): void
    {
        $this->deleteFile($album, 'image');
        $album->delete();

        $this->redirectRoute('admin.post.album');
    }

    public function showViewModal(AlbumModel $album): void
    {
        $this->submitMethod = '';
        $this->titleModal = 'Lihat Album';
        $this->isViewMode = true;

        $this->fillVariable($album);
    }

    public function showEditModal(AlbumModel $album): void
    {
        $this->submitMethod = 'update';
        $this->titleModal = 'Edit Album';
        $this->isEditMode = true;

        $this->fillVariable($album);
    }

    private function fillVariable(AlbumModel $album): void
    {
        $this->title = $album->title;
        $this->description = $album->description;
        $this->image = $album->image;
        $this->is_public = $album->is_public;
        $this->album = $album;
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
