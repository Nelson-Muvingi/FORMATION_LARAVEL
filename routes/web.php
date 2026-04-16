<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/blog')->name('blog.')->controller(PostController::class)->group(function () {
    Route::get('/', 'index')->name('index');

    Route::get('/{slug}-{id}', 'show')
        ->where([
            'id' => '[0-9]+',
            'slug' => '[a-z0-9\-]+',
        ])
        ->name('show');
});

Route::get('/debug-locale', function () {
    return app()->getLocale();
});
