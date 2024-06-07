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

    public function render()
    {
        $about = AboutModel::query()->first();
        if($about) {
            $this->about = $about->about;
            $this->history = $about->history;
        }

        return view('livewire.admin.post.about');
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

        $this->redirectRoute('admin.post.about');
    }
}
