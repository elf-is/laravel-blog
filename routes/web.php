<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
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

Route::get('/', [PostController::class, 'index'])->name('home');

Route::post('newsletter', NewsletterController::class);

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('show_post');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('posts/{post:slug}/comments/delete/{comment:id}', [PostCommentsController::class, 'destroy']);

Route::post('posts/{post:slug}/comments/edit/{comment:id}', [PostCommentsController::class, 'update']);

Route::get('admin/posts/create', [PostController::class, 'create'])->middleware(['admin'])->name('post_create');

Route::post('admin/posts', [PostController::class, 'store'])->middleware(['admin']);

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware(['admin'])->name('dashboard');

//Route::get('/admin/dashboard', function () {
//    return view('dashboard');
//})->middleware(['admin'])->name('dashboard');

require __DIR__ . '/auth.php';
