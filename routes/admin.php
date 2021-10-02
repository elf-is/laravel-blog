<?php


// Admin
use App\Http\Controllers\AdminPostController;
use Illuminate\Support\Facades\Route;

Route::middleware('can:admin')->group(function (){
    Route::get('admin/posts', [AdminPostController::class, 'index'])->name('dashboard');

    Route::post('admin/posts', [AdminPostController::class, 'store']);
    Route::get('admin/posts/create', [AdminPostController::class, 'create'])->name('post_create');

    Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('post_edit');
    Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->name('post_update');

    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('post_delete');
});
