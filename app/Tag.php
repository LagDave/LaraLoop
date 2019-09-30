<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = [
        'name'
    ];
    public function posts(){
        return $this->belongsToMany('App\Post');
    }
    public function forumPosts(){
        return $this->belongsToMany('App\ForumPost');
    }

    public function setNameAttribute($value){
        $this->attributes['name'] = strtolower($value);
    }
}
