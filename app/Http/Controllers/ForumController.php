<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Category;
use App\ForumPost;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(){
        $categories = Category::orderBy('id', 'asc')->get();
        $tags = Tag::orderBy('id', 'asc')->get();
        $forum_posts = ForumPost::orderBy('id', 'desc')->get();
        $main_content = 'components.forum.all_forum_posts';
        return view('forum', compact('categories', 'tags', 'forum_posts', 'main_content'));
    }
}
