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

Route::get('article-json', [App\Http\Controllers\ApiArticleControllers::class, 'show'])->name('ajax.request');

Route::put('article-views-increment', [App\Http\Controllers\ApiArticleControllers::class, 'viewsIncrement'])->name('ajax.views-increment');
Route::put('article-likes-increment', [App\Http\Controllers\ApiArticleControllers::class, 'likesIncrement'])->name('ajax.likes-increment');

Route::post('article-add-comment', [App\Http\Controllers\ApiCommentControler::class, 'store'])->name('ajax.add-comment');

Route::post('registration', [App\Http\Controllers\Auth\RegistrationController::class, 'show'])->name('registration');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'show'])->name('login');
Route::get('userinfo', [App\Http\Controllers\Auth\LoginController::class, 'userInfo'])->name('userinfo');
Route::get('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::fallback(function() {
    abort(404);
});
