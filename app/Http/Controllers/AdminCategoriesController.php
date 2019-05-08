<?php

namespace App\Http\Controllers;

use App\Category;
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
            return redirect('admin.categories.index')->with('success', 'The category and the posts related to it were deleted successfully');
        }
    }
}
