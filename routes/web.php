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
})->middleware(['auth'])->name('dashboard');

Route::resource('/users', UsersController::class)
    ->names(['index' => 'users.index']);

Route::resource('/avatars', AvatarsController::class)
    ->names(['index' => 'avatars.index']);

Route::resource('/categories', CategoriesController::class)
    ->names(['index' => 'categories.index']);

Route::resource('/gallery', GalleryController::class)
    ->names(['index' => 'gallery.index']);


require __DIR__.'/auth.php';
