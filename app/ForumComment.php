<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForumComment extends Model
{
    public $guarded = [
        'id'
    ];
    public function forum_post(){
        return $this->belongsTo("App\ForumPost");
    }
}
