<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['name','description','image','extras','user_id'];


    protected $with = ['user'];


    public function user(){
        return $this->belongsTo(User::class,'user_id');
    } 

    public function pages(){
        return $this->hasMany(Pages::class);
    } 
 
}
