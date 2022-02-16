<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/article/', [App\Http\Controllers\ArticleController::class, 'index'])->name('article');

Route::get('/article/{slug}', [App\Http\Controllers\ArticleController::class, 'showSlug'])->name('article.slug');

Route::get('/article/tag/{tag}', [App\Http\Controllers\ArticleController::class, 'byTag'])->name('article.tag');
