<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name'
    ];

    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function forumPosts(){
        return $this->hasMany('App\ForumPost');
    }
    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
}
