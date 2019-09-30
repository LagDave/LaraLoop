<?php

namespace App\Http\Controllers;

use App\ForumPost;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function home(){
        return ForumPost::find(6)->tags;
    }
}
