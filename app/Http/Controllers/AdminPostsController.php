<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where('id', '>', '0')->paginate(15);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post_title = $post->title;
        if($post->delete()){
            return redirect(route('admin.posts.index'))->with('success', 'Post - "'.$post_title.'" - successfully trashed');
        }
    }

    public function trashed(){
        $posts = Post::onlyTrashed()->get();
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
        if($post->forceDelete()){
            return redirect(route('admin.posts.trashed'))->with('success', 'Post deleted Permanently');
        }
    }
}
