<?php
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\AuthControl;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('login', [AuthControl::class,'login'])->name('login');


// Route::get('users', [AuthControl::class,'userfunction']);
Route::post('register', [AuthControl::class,'register']);
Route::post('login', [AuthControl::class,'login']);





Route::middleware('auth:api')->get('/users', [AuthControl::class,'userfunction']);
