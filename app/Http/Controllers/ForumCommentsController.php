<?php

namespace App\Http\Controllers;

use App\ForumPost;
use App\ForumComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ForumCommentsController extends Controller
{
    public function store(Request $request, ForumPost $forum_post){
        $data = [
            'commenter_id' => Auth::id(),
            'commenter_name'=>Auth::user()->name,
            'forum_post_id'=>$forum_post->id,
            'body' =>$request->body
        ];

        if(ForumComment::create($data)){
            return back();
        }
    }
}
