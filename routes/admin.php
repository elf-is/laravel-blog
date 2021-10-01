<?php


// Admin
use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware(['admin'])->name('dashboard');

Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware(['admin']);
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware(['admin'])->name('post_create');

Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware(['admin'])->name('post_edit');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware(['admin'])->name('post_update');

Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware(['admin'])->name('post_delete');