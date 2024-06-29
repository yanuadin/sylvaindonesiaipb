<?php

namespace App\Livewire;

use App\Models\AboutModel;
use Livewire\Component;
use Livewire\Attributes\On;

class About extends Component
{
    public function render()
    {
        $profile = AboutModel::query()->first();

        return view('livewire.about')->layout('layouts.guest')->with(['profile' => $profile]);
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
