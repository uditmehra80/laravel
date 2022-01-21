<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthControl;

use App\http\Controllers\GoogleController;
use App\http\Controllers\AppleController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('login', [AuthControl::class,'login'])->name('login');

Route::middleware('auth:api')->get('/users', [AuthControl::class,'userfunction']);

Route::view('reset_password', 'reset_password')->name('password.reset');


//Google LogIn

Route::prefix('google')->name('google.')->group( function(){
    Route::get('login', [GoogleController::class, 'loginWithGoogle'])->name('login');
    Route::any('callback', [GoogleController::class, 'callbackFromGoogle'])->name('callback');
});

////Apple LogIn

Route::get('/siwa-login', [AppleController::class,'login']);
Route::post('/siwa-callback', [AppleController::class,'callback']);

/////////////
