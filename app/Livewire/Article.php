<?php

namespace App\Livewire;

use App\Models\AboutModel;
use App\Models\PostModel;
use Livewire\Component;
use Livewire\Attributes\On;

class Article extends Component
{
    public function render()
    {
        $sylva_news = PostModel::query()
            ->where('type', PostModel::TYPE_SYLVA_NEWS)
            ->where('status', PostModel::STATUS_PUBLIC)
            ->orderBy('updated_at', 'DESC')
            ->paginate(6)
            ->withQueryString();

        $profile = AboutModel::query()->first();

        return view('livewire.article')->layout('layouts.guest')->with(['profile' => $profile, 'sylva_news' => $sylva_news]);
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
