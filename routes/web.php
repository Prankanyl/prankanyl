<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/contacts', [\App\Http\Controllers\HomeController::class, 'contacts'])->name('contacts');


Route::get('/article/{slug}', [\App\Http\Controllers\ArticleController::class, 'categories'])->name('list-article-categories');

Route::get('/project/{slug}', [\App\Http\Controllers\ProjectController::class, 'categories'])->name('list-project-categories');
