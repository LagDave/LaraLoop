<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::where('id', '>', '0')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=> 'required',
            'category_id'=>'required',

        ]);
        if($post->update($data)){
            $post->tags()->sync($request->tags);
            return back()->with('success', 'Post edited successfully');
        }
    }
    public function destroy(Post $post)
    {
        $post_title = $post->title;
        if($post->delete()){
            return back()->with('success', 'Post - "'.$post_title.'" - successfully trashed');
        }
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->paginate(15);
        return view('admin.posts.trashed', compact('posts'));
    }
    public function restore($id){
        if(
            Post::withTrashed()
                ->where('id', $id)
                ->restore()
        ){
            return back()->with('success', 'Post restored successfully');
        }
    }
    public function forceDelete($id){
        if(
        Post::withTrashed()
            ->where('id', $id)
            ->forceDelete()
        ){
            return back()->with('success', 'Post deleted permanently');
        }
    }

    public function create(){
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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

        return redirect(route('admin.posts.create'))->with('success', 'Post created Successfully');
    }
}