<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'category_id',
        'image'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function comments(){
        return $this->hasMany("App\Comment", 'post_id');
    }

    public function getCreatedAtAttribute($value){
        return $this->attributes['created_at'] = Carbon::parse($value)->diffForHumans();
    }

}
