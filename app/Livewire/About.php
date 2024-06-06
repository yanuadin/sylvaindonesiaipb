<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class About extends Component
{
    /**
     * @description : form
     */

    /**
     * @description : other
     */
     public string $titleModal = 'Tambah Livewire';
     public string $dataModal = 'create-livewire-modal';
     public array $tableHead = ['header_code' => 'header_name'];
     public string $submitMethod = 'store';
     public bool $isEditMode = false;
     public bool $isViewMode = false;
     public Model $model;

    public function render()
    {
        return view('livewire.about');
    }

    public function rules(): array
    {
        return [];
    }

    public function store(): void
    {


        $this->redirectRoute('route.name');
    }

    public function update(): void
    {


        $this->redirectRoute('route.name');
    }

    public function delete(Model $model): void
    {


        $this->redirectRoute('route.name');
    }

    public function showViewModal(Model $model): void
    {
        $this->submitMethod = '';
        $this->titleModal = 'Lihat Liveware';
        $this->isViewMode = true;

        $this->fillVariable($model);
    }

    public function showEditModal(Model $model): void
    {
        $this->submitMethod = 'update';
        $this->titleModal = 'Edit Livewire';
        $this->isEditMode = true;

        $this->fillVariable($model);
    }

    private function fillVariable(Model $model): void
    {
        //$this->variable = $model->field
        //$this->model = $model
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
