<?php

namespace App\Livewire;

use App\Models\AboutModel;
use App\Models\AlbumModel;
use Livewire\Component;
use Livewire\Attributes\On;

class Album extends Component
{
    public function render()
    {
        $albums = AlbumModel::query()
            ->where('is_public', '=' , 1)
            ->orderBy('updated_at', 'desc')
            ->limit(9)
            ->get();

        $profile = AboutModel::query()->first();

        return view('livewire.album')->layout('layouts.guest')->with(['profile' => $profile, 'albums' => $albums]);
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
