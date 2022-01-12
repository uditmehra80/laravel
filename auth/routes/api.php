<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthControl;
use App\http\Controllers\ForgotPasswordController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthControl::class,'register']);

Route::post('login', [AuthControl::class,'login']);



Route::post('forgot-password', [ForgotPasswordController::class,'forgot']);

Route::post('reset-password', [ForgotPasswordController::class,'reset']);

