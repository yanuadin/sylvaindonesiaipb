<?php

namespace App\Livewire\Admin\Master;

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
    public $updated_at;
    public $updated_by;

    public function render()
    {
        $about = AboutModel::query()->first();
        if($about) {
            $this->about = $about->about;
            $this->history = $about->history;
            $this->updated_at = $about->updated_at;
            $this->updated_by = $about->updatedBy->name;
        }

        return view('livewire.admin.master.about');
    }

    public function rules(): array
    {
        return [
            'about' => ['required', 'string',],
            'history' => ['required', 'string'],
        ];

    }

    public function storeOrUpdate(): void
    {
        $validated = $this->validate($this->rules());

        if(AboutModel::query()->count() === 0) {
            AboutModel::query()->create([
                'about' => $validated['about'],
                'history' => $validated['history'],
                'created_by' => auth()->user()->id,
                'updated_by' => auth()->user()->id
            ]);
        } else {
            AboutModel::query()->first()->update([
                'about' => $validated['about'],
                'history' => $validated['history'],
                'updated_by' => auth()->user()->id
            ]);
        }

        $this->redirectRoute('admin.master.about');
    }
}
