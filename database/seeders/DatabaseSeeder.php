<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\UserModel::factory(10)->create();

         UserModel::query()->create([
             'name' => 'Admin',
             'username' => 'admin',
             'password' => Hash::make('password'),
         ]);
    }
}
