<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('dashboard', compact('user'));
})->middleware(['auth'])->name('dashboard');

Route::resource('/users', UsersController::class)
    ->names([
        'index' => 'users.index'
    ])
;

require __DIR__.'/auth.php';
