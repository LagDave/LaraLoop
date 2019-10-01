<?php

namespace App\Http\Controllers;


use App\Tag;
use App\Post;
use App\User;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

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
        $new_tags_ids = [];
        $existing_tags_ids = [];
        foreach($request->all()['tags'] as $tag){
            $tag = explode(':', $tag);
            $probable_match_tag = Tag::where(['name'=>$tag[1]])->get();
            if(sizeof($probable_match_tag) > 0){
                array_push($existing_tags_ids, $probable_match_tag[0]->id);
            }else{
                if($tag[0] < 0){
                    $new_tag = Tag::create(['name'=>$tag[1]]);
                    array_push($new_tags_ids, $new_tag->id);
                }else{
                    array_push($existing_tags_ids, $tag[0]);
                }
            }

        }
        $data = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=> 'required',
            'category_id'=>'required'
        ]);

        $data['user_id'] = Auth::id();
        $post = Post::create($data);

        foreach($existing_tags_ids as $tag){
            $post->tags()->attach($tag);
        }
        foreach($new_tags_ids as $tag){
            $post->tags()->attach($tag);
        }

        return redirect(route('posts.create'))->with('success', 'Post created Successfully');
    }
    public function results(Request $request){
        $query = trim(preg_replace('/\s+/',' ', Input::get('query')));
        $queries_list = explode(" ", $query);
        $posts = Post::where('title', 'like', '%'.$query.'%')->orderBy('id', 'DESC')->paginate(3);
        
        $categories = Category::all();
        $tags = Tag::all();
        $header_name = 'Search: <u><b>'.$query.'</b></u>';

        return view('users.posts.classification_results', compact('posts', 'categories', 'tags', 'header_name'));
    
    }

    public function tagPosts(Tag $tag){
        $posts = $tag->posts()->orderBy('id', 'DESC')->get();
        $categories = Category::all();
        $tags = Tag::all();
        $header_name = 'Tag: <u><b>'.$tag->name.'</b></u>';
        return view('users.posts.classification_results', compact('posts', 'categories', 'tags', 'header_name'));
    }
    public function categoryPosts(Category $category){
        $posts = $category->posts()->orderBy('id', 'DESC')->get();
        $categories = Category::all();
        $tags = Tag::all();
        $header_name = 'Category: <u><b>'.$category->name.'</b></u>';
        return view('users.posts.classification_results', compact('posts', 'categories', 'tags', 'header_name'));
    }
}
