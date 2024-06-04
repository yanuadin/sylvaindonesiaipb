<?php

namespace Database\Seeders;

use App\Models\TagModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tagList = [
            [
                'code' => 'news',
                'name' => 'Berita'
            ],
            [
                'code' => 'sains',
                'name' => 'Sains'
            ],
            [
                'code' => 'hot',
                'name' => 'Trending'
            ],
        ];

        foreach ($tagList as $tag) {
            TagModel::query()->create($tag);
        }
    }
}
