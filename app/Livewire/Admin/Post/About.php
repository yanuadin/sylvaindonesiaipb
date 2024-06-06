<?php

namespace App\Livewire\Admin\Post;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\AboutModel;

class About extends Component
{
    /**
    * @description : form
    */
    public string $about = '';
    public string $history = '';
    public string $search = '';

    /**
    * @description : other
    */
    public string $titleModal = 'Tambah About';
    public string $dataModal = 'create-about-modal';
    public array $tableHead = ['about' => 'Tentang','history' => 'Sejarah'];
    public string $submitMethod = 'store';
    public bool $isEditMode = false;
    public bool $isViewMode = false;
    public AboutModel $aboutModel;

    public function render()
    {
        $search = $this->search;

        $abouts = AboutModel::query()
            ->paginate(10)
            ->withQueryString();

        return view('livewire.admin.post.about')->with(['abouts' => $abouts]);
    }

    public function rules(): array
    {
        return [
            'about' => ['required', 'string',],
            'history' => ['required', 'string'],
        ];
        
    }

    public function store(): void
    {
        $validated = $this->validate($this->rules());

        AboutModel::query()->create([
            'about' => $validated['about'],
            'history' => $validated['history'],
            'created_by' => auth()->user()->id,
            'updated_by' => auth()->user()->id
        ]);

        $this->redirectRoute('admin.post.about');
    }

    public function update(): void
    {
        $validated = $this->validate($this->rules());

        $this->aboutModel->about = $validated['about'];
        $this->aboutModel->history = $validated['history'];
        $this->aboutModel->save();

        $this->redirectRoute('admin.post.about');
    }

    public function delete(AboutModel $about): void
    {
        $about->delete();

        $this->redirectRoute('admin.post.about');
    }

    public function showViewModal(AboutModel $about): void
    {
        $this->submitMethod = '';
        $this->titleModal = 'Lihat About';
        $this->isViewMode = true;

        $this->fillVariable($about);
    }

    public function showEditModal(AboutModel $about): void
    {
        $this->submitMethod = 'update';
        $this->titleModal = 'Edit About';
        $this->isEditMode = true;

        $this->fillVariable($about);
    }

    private function fillVariable(AboutModel $about): void
    {
        $this->about = $about->about;
        $this->history = $about->history;
        $this->aboutModel = $about;
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
