<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumPost extends Model
{
    public $guarded = [
        'id'
    ];
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function category(){
        return $this->belongsTo('App\Category', 'category_id');
    }
    public function comments(){
        return $this->hasMany('App\ForumComment');
    }
}
