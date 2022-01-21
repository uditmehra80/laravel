<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','url','extras','seo','tags','styles','type','user_id','project_id'];


    protected $with = ['project','user'];

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    } 
}
