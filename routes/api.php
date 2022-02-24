<?php

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('article-json', [App\Http\Controllers\ApiArticleControllers::class, 'show'])->name('ajax.request');

Route::put('article-views-increment', [App\Http\Controllers\ApiArticleControllers::class, 'viewsIncrement'])->name('ajax.views-increment');
Route::put('article-likes-increment', [App\Http\Controllers\ApiArticleControllers::class, 'likesIncrement'])->name('ajax.likes-increment');


