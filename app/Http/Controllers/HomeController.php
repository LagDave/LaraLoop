<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        $tags = Tag::orderBy('id', 'asc')->get();
        $posts = Post::orderBy('id', 'desc')->paginate(10);
        return view('home',compact('categories', 'tags', 'posts'));
    }
}
