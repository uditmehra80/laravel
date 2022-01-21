<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest();

        if(request('search')){
        $posts
            ->where('title', 'like', '%'. request('search').'%')
            ->orwhere('body', 'like', '%'. request('search').'%')
            ->orwhere('excerpt', 'like', '%'. request('search').'%');
        }

        return view('posts',[
        'posts' =>  $posts->get(),
        'categories' => Category::all()
        ]);

          // $posts = Post::latest();

        // if(request('search')){
        // $posts
        //     ->where('title', 'like', '%'. request('search').'%')
        //     ->orwhere('body', 'like', '%'. request('search').'%')
        //     ->orwhere('excerpt', 'like', '%'. request('search').'%');
        // }

        // return view('posts',[
        //     'posts' => Post::latest()->filter(request(['search']))->get(),
        //     'categories' => Category::all()
        //     ]);
    }

    public function show(Post $post)
    {
        return view('post',[
            "post" => $post
        ]);
    }
}
