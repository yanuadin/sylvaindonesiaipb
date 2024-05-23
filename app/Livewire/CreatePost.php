<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Post')]
class CreatePost extends Component
{
    public $title = 'Create Post';

    public function render()
    {
        $data = User::all();

        return view('livewire.create-post')->with([
            'ngeb' => $data
        ]);
    }
}
