<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //fillable these contetnt comes frontend 
    protected $fillable = ['title','excerpt','body'];


    protected $with = ['category','author'];

    
    public function scopeFilter($query, array $filters)
    {
       $query->when($filters['search'] ?? false, fn($query, $search) =>
         $query
         ->where('title', 'like', '%'. request('search').'%')
         ->orwhere('body', 'like', '%'. request('search').'%')
         ->orwhere('excerpt', 'like', '%'. request('search').'%'));
    } 

    public function comments(){
        return $this->hasMany(Comment::class);
    } 

    public function category(){
        return $this->belongsTo(Category::class);
    } 

    public function author(){
        return $this->belongsTo(User::class,'user_id');
    } 
}
