<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Article extends Component
{
    public function render()
    {
        return view('livewire.article')->layout('layouts.guest');
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
