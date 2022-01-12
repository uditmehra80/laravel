<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthControl;




Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthControl::class,'login'])->name('login');

Route::middleware('auth:api')->get('/users', [AuthControl::class,'userfunction']);

Route::view('reset_password', 'reset_password')->name('password.reset');