<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('posts');
});

Route::get('/post/{post}', function ($slug) {

    return view('post',[
        "post" => Post::find($slug)
    ]);

});
