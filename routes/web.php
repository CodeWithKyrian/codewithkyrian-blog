<?php

use App\Http\Controllers\Auth\SocialiteController;
use App\Livewire\AboutPage;
use App\Livewire\HomePage;
use App\Livewire\ShowCategory;
use App\Livewire\ShowPost;
use App\Livewire\ShowTag;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/about-kyrian', AboutPage::class)->name('about');
Route::get('/p/{post:slug}', ShowPost::class)->name('post.show');
Route::get('/t/{tag:slug}', ShowTag::class)->name('tag.show');
Route::get('/c/{category:slug}', ShowCategory::class)->name('category.show');

Route::get('auth/{provider}/redirect', [SocialiteController::class, 'login'])->name('socialite.auth');
Route::get('auth/{provider}/callback', [SocialiteController::class, 'callback'])->name('socialite.callback');

Route::get('/generate-sitemap', function () {
    Artisan::call('sitemap:generate');

    return 'Sitemap generated';
});
