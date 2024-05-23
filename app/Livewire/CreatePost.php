<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class CreatePost extends Component
{
    public function render()
    {
        $data = User::all();

        return view('livewire.create-post')->with([
            'ngeb' => $data
        ]);
    }
}
