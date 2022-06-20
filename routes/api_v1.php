<?php

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::get('/get-articles/{article_slug?}', [ApiController::class, 'getArticles'])->name('get-articles');
Route::get('/get-projects/{project_slug?}', [ApiController::class, 'getProjects'])->name('get-projects');
//Route::group(['middleware' => 'auth:api'], function (){
//
//});
