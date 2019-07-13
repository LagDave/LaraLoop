<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Request;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request){
        $data = $request->validate([
            'comment_body'=> "min:1"
        ]);
        $comment = new Comment();
        $comment->commenter_name = Auth::user()->name;
        $comment->commenter_id = Auth::id();
        $comment->comment_body = $request->comment_body;

        if($post->comments()->save($comment)){
            return back()->with("success", "Comment Added Successfully.");
        }
    }
    public function destroy(Post $post, Comment $comment){
        if($comment->delete()){
            return back()->with('success', 'Comment deleted.');
        }else{
            return back()->with('failed', 'Comment not deleted.');
        }
    }
    public function update(Request $request, Post $post, Comment $comment){
        $comment->update([
            'comment_body'=> $request->new_comment_body
        ]);

        return back()->with('success', 'Comment updated.');
    }
}
