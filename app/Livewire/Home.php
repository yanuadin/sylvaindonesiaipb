<?php

namespace App\Livewire;

use App\Models\AboutModel;
use App\Models\PostModel;
use Livewire\Component;
use Livewire\Attributes\On;

class Home extends Component
{
    public function render()
    {
        $sylva_news = PostModel::query()
            ->where('type', PostModel::TYPE_SYLVA_NEWS)
            ->where('status', PostModel::STATUS_PUBLIC)
            ->orderBy('updated_at', 'DESC')
            ->limit(6)
            ->get();

        $profile = AboutModel::query()->first();

        return view('livewire.home', ['profile' => $profile])->layout('layouts.guest')
            ->with(['sylva_news' => $sylva_news]);
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
