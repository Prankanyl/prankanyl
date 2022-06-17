<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Project\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');

Route::group(['prefix' => 'article'], function () {
    Route::get('/', [ArticleController::class, 'index'])->name('article-list');
    Route::get('/{category_slug}', [ArticleController::class, 'articleCategory'])->name('article-category-list');
    Route::get('/{category_slug}/{article_slug}', [ArticleController::class, 'articleDetail'])->name('article-detail');
    Route::get('/add/form', [ArticleController::class, 'articleAddFrom'])->name('article-add-form');
    Route::get('/{category_slug}/{article_slug}/update/form', [ArticleController::class, 'articleUpdateFrom'])->name('article-update-form');
    Route::post('/add', [ArticleController::class, 'articleAdd'])->name('article-add');
    Route::put('/{category_slug}/{article_slug}/update', [ArticleController::class, 'articleUpdate'])->name('article-update');
    Route::delete('/{category_slug}/{article_slug}/delete', [ArticleController::class, 'articleDelete'])->name('article-delete');
});

Route::group(['prefix' => 'project'], function () {
    Route::get('/', [ProjectController::class, 'index'])->name('project-list');
    Route::get('/{category_slug}', [ProjectController::class, 'projectCategory'])->name('project-category-list');
    Route::get('/{category_slug}/{slug}', [ProjectController::class, 'projectDetail'])->name('project-detail');
});
