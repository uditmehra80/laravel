<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;    

class PostController extends Controller
{
    public function index(){

      $posts =  Post::all();
      return view('posts.index', ['posts' => $posts]);

    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'title' => request('title'),
            'content' => request('content'),
        ]);
       
       return redirect('/posts')->with('msg','Post Created Successfully');
    }

    public function edit(Post $post){
        return view('posts.edit', ['post' => $post]);
    }

    public function update(Post $post){

        request()->validate([
            'title' => 'required',
            'content' => 'required',
        ]);

       $post -> update([
           'title' => request('title'),
            'content' => request('content'),
       ]);

       return redirect('/posts')->with('update','Post Updated Successfully');
    }

    public function deletePost($id){
        Post::where('id',$id)->delete();
        return redirect('/posts')->with('delete','Post Deleted');
    }
}
