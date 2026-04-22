<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Routes d'authentification
Route::controller(AuthController::class)->group(function () {
    Route::get('/register', 'register')->name('auth.register');
    Route::post('/register', 'doRegister');
    Route::get('/login', 'login')->name('auth.login');
    Route::post('/login', 'doLogin');
    Route::delete('/logout', 'logout')->name('auth.logout');
});

Route::prefix('/blog')->name('blog.')->controller(PostController::class)->group(function () {
    // Routes publiques
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}-{post}', 'show')
        ->where([
            'post' => '[0-9]+',
            'slug' => '[a-z0-9\-]+',
        ])
        ->name('show');

    // Routes protégées
    Route::middleware('auth')->group(function () {
        Route::get('/new', 'create')->name('create');
        Route::post('/new', 'store');

        Route::get('/{post}/edit', 'edit')->name('edit');
        Route::patch('/{post}/edit', 'update');
    });

});
