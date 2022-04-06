<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
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

// frontend route
Route::get('/', [HomeController::class, 'home'])->name('home');
/*comments routes*/
Route::post('posts/{post:slug}/comment', [HomeController::class, 'storeComment'])->name('posts.store.comment');
Route::get('categories/{category:slug}', [HomeController::class, 'categoryPosts'])->name('category-posts');

/*posts routes*/
Route::get('posts/author/{author:username}', [PostController::class, 'authorPosts'])->name('author-posts');
Route::get('posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('posts/store', [PostController::class, 'store'])->name('posts.store');
Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('posts/{post:slug}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('posts/{post:slug}/update', [PostController::class, 'update'])->name('posts.update');
Route::delete('posts/{post:slug}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');

/*newsletters route*/
Route::post('newsletter', NewsletterController::class)->name('newsletter');

require __DIR__ . '/auth.php';
