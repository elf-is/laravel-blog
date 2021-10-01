<?php


// Admin
use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware(['admin'])->name('dashboard');

Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware(['admin']);
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware(['admin'])->name('post_create');

Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware(['admin']);