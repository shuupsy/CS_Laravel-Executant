<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AvatarsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\CategoriesController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('dashboard', compact('user'));
})
    ->middleware(['auth'])
    ->name('dashboard');

Route::resource('/users', UsersController::class)
    ->names(['index' => 'users.index'])
    ->middleware(['auth','access']);

Route::resource('/avatars', AvatarsController::class)
    ->middleware(['auth', 'access'])
    ->names(['index' => 'avatars.index']);

Route::resource('/categories', CategoriesController::class)
    ->middleware(['auth', 'access'])
    ->names(['index' => 'categories.index']);

Route::resource('/gallery', GalleryController::class)
    ->middleware(['auth'])
    ->names(['index' => 'gallery.index']);



require __DIR__.'/auth.php';
