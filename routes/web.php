<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsletterController;
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
Route::get('/posts/{post:slug}', [HomeController::class, 'post'])->name('posts.show');
Route::post('/posts/{post:slug}/comment', [HomeController::class, 'storeComment'])->name('posts.store.comment');
Route::get('/categories/{category:slug}', [HomeController::class, 'categoryPosts'])->name('category-posts');
Route::get('/author/{author:username}', [HomeController::class, 'authorPosts'])->name('author-posts');

Route::post('newsletter', NewsletterController::class)->name('newsletter');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';
