<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PostController as AdminPostController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function() {
    Route::resource('posts', PostController::class);
    //Route::resource('users', UserController::class);
    Route::get('/home', [PostController::class, 'index'])->name('home');
});

Route::middleware('admin')->prefix('admin')->group( function () {
        // Route::get('/dashboard', function () {
        //     return view('admin.posts.index');
        // });

        // User management routes
        Route::resource('users', UserController::class);

        // Blog post management routes
        Route::resource('posts', AdminPostController::class);
});

Auth::routes();
