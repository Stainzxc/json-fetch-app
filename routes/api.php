<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\AlbumController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\TodoController;

Route::get('/', function () {
    return response()->json([
        'message' => 'API is running'
    ]);
});

Route::middleware('auth.basic')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/comments', [CommentController::class, 'index']);
    Route::get('/albums', [AlbumController::class, 'index']);
    Route::get('/photos', [PhotoController::class, 'index']);
    Route::get('/todos', [TodoController::class, 'index']);
    Route::apiResource('posts', PostController::class);
    Route::get('/posts/{id}/comments', [PostController::class, 'comments']);
});
