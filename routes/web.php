<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/{slug}-{post}', 'show')
        ->where([
            'post' => '[0-9]+',
            'slug' => '[a-z0-9\-]+',
        ])
        ->name('show');

    Route::get('/new', 'create')->name('create');
    Route::post('/new', 'store');

    Route::get('/{post}/edit', 'edit')->name('edit');
    Route::patch('/{post}/edit', 'update');
});
