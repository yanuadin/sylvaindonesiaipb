<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', \App\Livewire\Home::class)->name('home');
Route::get('/article', \App\Livewire\Article::class)->name('article');
Route::get('/about', \App\Livewire\About::class)->name('about');
Route::get('/article/{slug}', \App\Livewire\Inner::class)->name('inner');
Route::get('/album', \App\Livewire\Album::class)->name('album');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('admin.dashboard');

    //Post
    Route::get('/post/sylva-news', \App\Livewire\Admin\Post\SylvaNews::class)->name('admin.post.sylva-news');
    Route::get('/post/album', \App\Livewire\Admin\Post\Album::class)->name('admin.post.album');


    //Series
    Route::get('/series/sylva-discussion', \App\Livewire\Admin\Series\SylvaDiscussion::class)->name('admin.series.sylva-discussion');
    Route::get('/series/sylva-training', \App\Livewire\Admin\Series\SylvaTraining::class)->name('admin.series.sylva-training');

    //Master
    Route::get('/master/user', \App\Livewire\Admin\Master\User::class)->name('admin.master.user');
    Route::get('/master/tag', \App\Livewire\Admin\Master\Tag::class)->name('admin.master.tag');
    Route::get('/master/profile', \App\Livewire\Admin\Master\About::class)->name('admin.master.about');
});
