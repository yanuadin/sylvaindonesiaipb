<?php

namespace App\Livewire;

use App\Models\AboutModel;
use App\Models\PostModel;
use Livewire\Component;
use Livewire\Attributes\On;

class Inner extends Component
{
    public string $slug = '';

    public function render()
    {
        $news = PostModel::query()
            ->where('type', PostModel::TYPE_SYLVA_NEWS)
            ->where('status', PostModel::STATUS_PUBLIC)
            ->where('slug', $this->slug)
            ->firstOrFail();

        $other_news = PostModel::query()
            ->whereNot('slug', $news->slug)
            ->where('type', PostModel::TYPE_SYLVA_NEWS)
            ->where('status', PostModel::STATUS_PUBLIC)
            ->orderBy('updated_at', 'DESC')
            ->limit(5)
            ->get();

        $profile = AboutModel::query()->first();

        return view('livewire.inner')->layout('layouts.guest')->with(['news' => $news, 'other_news' => $other_news, 'profile' => $profile]);
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
