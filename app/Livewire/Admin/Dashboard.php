<?php

namespace App\Livewire\Admin;

use App\Models\PostModel;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $sylva_news_count = PostModel::query()->where('type', PostModel::TYPE_SYLVA_NEWS);
        $sylva_discussion_count = PostModel::query()->where('type', PostModel::TYPE_SYLVA_DISCUSSION);
        $sylva_training_count = PostModel::query()->where('type', PostModel::TYPE_SYLVA_TRAINING);

        return view('livewire.admin.dashboard', [
            'sylva_news' => [
                'count' => $sylva_news_count->count(),
                'top10' => $sylva_news_count->limit(10)->get(),
            ],
            'sylva_discussion' => [
                'count' => $sylva_discussion_count->count(),
                'top10' => $sylva_discussion_count->limit(10)->get(),
            ],
            'sylva_training' => [
                'count' => $sylva_training_count->count(),
                'top10' => $sylva_training_count->limit(10)->get(),
            ],
        ]);
    }
}
