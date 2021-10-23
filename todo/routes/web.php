<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\PostController;

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class,'index']);

Route::get('posts/create', [PostController::class,'create']);
Route::get('posts', [PostController::class,'index']);
Route::post('posts', [PostController::class,'store']);
Route::get('posts/{post}/edit', [PostController::class,'edit']);
Route::put('posts/{post}', [PostController::class,'update']);
Route::get('delete-post/{id}', [PostController::class,'deletePost']);
