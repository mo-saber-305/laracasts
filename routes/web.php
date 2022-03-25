<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
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
// auth route
Route::get('/register', [RegisterController::class, 'index'])->name('register');

// frontend route
Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/posts/{post:slug}', [HomeController::class, 'post'])->name('posts.show');
Route::get('/categories/{category:slug}', [HomeController::class, 'categoryPosts'])->name('category-posts');
Route::get('/author/{author:username}', [HomeController::class, 'authorPosts'])->name('author-posts');
