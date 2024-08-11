<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'posts');
Route::resource('posts', PostController::class);

Route::get('/{user}/posts', [DashboardController::class, 'usersPosts'])->name('posts.user');

Route::middleware('guest')->group(function() {

        Route::get('/register', function (){
        return view('auth.register');
        })->middleware('guest')->name('register');
        Route::post('/register',[AuthController::class, 'register']);

        Route::get('/login', function() {
            return view('auth.login');
        })->name('login');
        Route::post('/login',[AuthController::class, 'login']);
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    Route::get('/logout',[AuthController::class, 'logout'])->name('logout');
});
