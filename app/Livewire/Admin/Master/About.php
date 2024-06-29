<?php

namespace App\Livewire\Admin\Master;

use App\Traits\FileProcess;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\AboutModel;
use Livewire\WithFileUploads;

class About extends Component
{
    use WithFileUploads, FileProcess;

    /**
     * @description : form
     */
    public $about;
    public $history;
    public $image;
    public $contact;
    public $updated_at;
    public $updated_by;
    public $aboutModel;

    public function render()
    {
        $about = AboutModel::query()->first();
        if($about) {
            $this->about = $about->about;
            $this->history = $about->history;
            $this->contact = $about->contact;
            $this->updated_at = $about->updated_at;
            $this->updated_by = $about->updatedBy->name;
            $this->aboutModel = $about;

            if($this->image === null || is_string($this->image)) {
                $this->image = $about->image;
            }
        }

        return view('livewire.admin.master.about');
    }

    public function rules(): array
    {
        return [
            'about' => ['required', 'string',],
            'history' => ['required', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:3072'],
            'contact' => ['nullable', 'string', 'max:15'],
        ];

    }

    public function storeOrUpdate(): void
    {
        if(is_string($this->image))
            $this->image = null;

        $validated = $this->validate($this->rules());

        if(AboutModel::query()->count() === 0) {
            $validated['image'] = $this->storeFile($validated['image'], 'about');

            AboutModel::query()->create([
                'about' => $validated['about'],
                'history' => $validated['history'],
                'image' => $validated['image'],
                'contact' => $validated['contact'],
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ]);
        } else {
            $validated['image'] = $this->updateFile($validated['image'], 'about', $this->aboutModel, 'image');

            AboutModel::query()->first()->update([
                'about' => $validated['about'],
                'history' => $validated['history'],
                'image' => $validated['image'],
                'contact' => $validated['contact'],
                'updated_by' => auth()->user()->id
            ]);
        }

        $this->redirectRoute('admin.master.about');
    }
}
