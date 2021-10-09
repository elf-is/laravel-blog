<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('posts.show');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store'])->name('comment.store');

Route::delete('posts/{post:slug}/comments/delete/{comment:id}', [PostCommentsController::class, 'destroy'])->name('comment.destroy');

Route::patch('posts/{post:slug}/comments/edit/{comment:id}', [PostCommentsController::class, 'update'])->name('comment.update');