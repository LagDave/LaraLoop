<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public $guarded = [
        'id',
        'post_id'
    ];
    public function post(){
        return $this->belongsTo("App\Post");

    }
}
