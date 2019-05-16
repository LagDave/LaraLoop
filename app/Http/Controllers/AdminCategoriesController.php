<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

class AdminCategoriesController extends Controller
{
    public function index(){
        $categories = Category::where('id', '>', '0')->paginate(15);
        return view('admin.categories.index', compact('categories'));
    }
    public function destroy(Category $category){
        $posts = $category->posts;
        foreach($posts as $post){
            $post->forceDelete();
        }
        if($category->delete()){
            return redirect(route('admin.categories.index'))->with('success', 'The category and the posts related to it were deleted successfully');
        }
    }

    public function edit(Category $category){
        $posts = Post::where('category_id', $category->id)->paginate(15);
        return view('admin.categories.edit', compact('category', 'posts'));
    }
    public function update(Category $category, Request $request){
        $data = $request->validate([
            'name'=>'required|unique:categories,name'
        ]);
        if($category->update($data)){
            return redirect(route('admin.categories.index'))->with('success', 'Category updated successfully');
        }
    }

    public function create(){
        return view('admin.categories.create');
    }
    public function store(Request $request){
        $data = $request->validate([
            'name'=>'required'
        ]);
        if(Category::create($data)){
            return redirect(route('admin.categories.create'))->with('success', 'Category created successfully');
        }
    }
}
