<?php

namespace App\Models;

class Post{
    public static function all(){
        
        return $post =  file_get_contents($path);
    
    }

    public static function find($slug){


    if(! file_exists($path = resource_path("/../resources/posts/{$slug}.html"))){
        abort(404);
    }

    return $post =  file_get_contents($path);

    }
}