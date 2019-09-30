<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\ForumPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumPostsController extends Controller
{
    public function store(Request $request){
        // Get the User Name and Id and Assign to variables
        $forum_post_user_name = Auth::user()->name;
        $forum_post_user_id = Auth::id();
        // Save the post with the category, visibility, body and the auth vars

        $post = ForumPost::create([
            'forum_post_user_name'=> $forum_post_user_name,
            'forum_post_user_id'=>$forum_post_user_id,
            'forum_post_body'=>$request->forum_post_body,
            'category_id'=>$request->category_id,
            'visibility'=>$request->visibility
        ]);

        // Attach the tags and create undefined ones if they exist
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

        foreach($existing_tags_ids as $tag){
            $post->tags()->attach($tag);
        }
        foreach($new_tags_ids as $tag){
            $post->tags()->attach($tag);
        }
        return $post;


        // redirect back to route(forum.index)

    }
    public function show(ForumPost $forum_post){
        $main_content = 'users.forum.show';
        $categories = Category::orderBy('id', 'asc')->get();
        $tags = Tag::orderBy('id', 'asc')->get();
        $forum_post = $forum_post;
        return view('forum', compact('main_content', 'tags', 'categories', 'forum_post'));
    }
}
