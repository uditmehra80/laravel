<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Route;



Route::get('/', [PostController::class,'index'])->name('home');

Route::get("posts/{post}",[PostController::class,'show']);

Route::get("categories/{category:slug}", function (Category $category) {

    return view('posts',[
        "posts" => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()
    ]);
    
})->name('category');

Route::get("authors/{author:username}", function (User $author) {
    return view('posts',[
        "posts" => $author ->posts,
        'categories' => Category::all()
    ]);
});

Route::get("register",[RegisterController::class,'create'])->middleware('guest');
Route::post("register",[RegisterController::class,'store'])->middleware('guest');

Route::get("login",[SessionsController::class,'create'])->middleware('guest');
Route::post("login",[SessionsController::class,'store'])->middleware('guest');

Route::post("/posts/{post:slug}/comments",[CommentController::class,'store'])->middleware('auth');

Route::post("logout",[SessionsController::class,'logout'])->middleware('auth');

Route::post("newsletter",function(){
    request()->validate(['email' => 'required|email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
	    'apiKey' => config('services.mailchimp.key'),
	    'server' => 'us14'
    ]);

    $response = $mailchimp->lists->addListMember('3fbab7211c',[
         'email_address'=> request('email'),
        'status' => 'subscribed'
    ]);
    return redirect('/')->with('success','Thanks for subscribe');
});
