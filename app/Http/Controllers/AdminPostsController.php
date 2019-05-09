<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{

    public function index()
    {
        $posts = Post::where('id', '>', '0')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        //
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title'=>'required|max:255',
            'body'=>'required'
        ]);
        if($post->update($data)){
            return redirect(route('admin.posts.index'))->with('success', 'Post edited successfully');
        }
    }
    public function destroy(Post $post)
    {
        $post_title = $post->title;
        if($post->delete()){
            return redirect(route('admin.posts.index'))->with('success', 'Post - "'.$post_title.'" - successfully trashed');
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
            return redirect(route('admin.posts.trashed'))->with('success', 'Post restored successfully');
        }
    }
    public function forceDelete($id){
        if(
        Post::withTrashed()
            ->where('id', $id)
            ->forceDelete()
        ){
            return redirect(route('admin.posts.trashed'))->with('success', 'Post deleted permanently');
        }
    }
}
