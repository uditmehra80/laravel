<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthControl;
use App\http\Controllers\ForgotPasswordController;
use App\http\Controllers\PageController;
use App\http\Controllers\ProjectController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//////////--- Auth
Route::post('register', [AuthControl::class,'register']);
Route::post('login', [AuthControl::class,'login']);
Route::post('forgot-password', [ForgotPasswordController::class,'forgot']);
Route::post('reset-password', [ForgotPasswordController::class,'reset']);

////----- PAGES
Route::middleware('auth:api')->post('pages', [PageController::class,'create']);
Route::middleware('auth:api')->get('pages', [PageController::class,'index']);
Route::middleware('auth:api')->put('update-pages/{id}', [PageController::class,'update']);
Route::middleware('auth:api')->delete('delete-pages/{id}', [PageController::class,'delete']);


////-------- PROJECTS
Route::middleware('auth:api')->post('/project', [ProjectController::class,'create']);
Route::middleware('auth:api')->get('project', [ProjectController::class,'index']);
Route::middleware('auth:api')->put('update-project/{id}', [ProjectController::class,'update']);
Route::middleware('auth:api')->delete('delete-project/{id}', [ProjectController::class,'delete']);

