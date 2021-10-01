<?php

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('posts/{post:slug}', [PostController::class, 'show'])->name('show_post');

Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('posts/{post:slug}/comments/delete/{comment:id}', [PostCommentsController::class, 'destroy']);

Route::post('posts/{post:slug}/comments/edit/{comment:id}', [PostCommentsController::class, 'update']);