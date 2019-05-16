<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class AdminTagsController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    public function edit(Tag $tag){
        $posts = $tag->posts;
        return view('admin.tags.edit', compact('tag', 'posts'));
    }
    public function update(Tag $tag, Request $request){
        $data = $request->validate([
            'name'=>'required|unique:tags,name'
        ]);
        if($tag->update($data)){
            return back()->with('success', 'Tag successfully updated');
        }
    }
    public function destroy(Tag $tag){
        if($tag->delete()){
            return back()->with('success', 'Tag deleted successfully');
        }
    }

    public function create(){
        return view('admin.tags.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required'
        ]);
        if(Tag::create($data)){
            return redirect(route('admin.tags.create'))->with('success', 'Tag created successfully');
        }
    }


}
