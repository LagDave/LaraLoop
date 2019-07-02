<?php

namespace App\Http\Controllers;


use App\Category;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{

//    CRUD Methods
    public function show(Post $post){
        $tags = $post->tags;

        $data = compact('post', 'tags');
        return view('users.posts.show', $data);
    }
    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('users.posts.create', compact('categories', 'tags'));
    }

    public function store(Request $request){

        $data = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=> 'required',
            'category_id'=>'required'
        ]);

        $data['user_id'] = Auth::id();
        $post = Post::create($data);

        foreach($request->tags as $tag){
            $post->tags()->attach($tag);
        }

        return redirect(route('posts.create'))->with('success', 'Post created Successfully');
    }
//    API CALL Methods
}
