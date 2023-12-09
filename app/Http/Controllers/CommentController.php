<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function send_comment(Request $request) {
        $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|email',
            'comment' => 'required',
            'blog_id' => 'required|integer',
            'parent_id' => 'required|integer'
        ]);

        $comment = new Comment();
        $comment->name = $request->name;
        $comment->email = $request->email;
        $comment->comment = $request->comment;
        $comment->blog_id = $request->blog_id;
        $comment->parent_id = $request->parent_id;
        $comment->save();

        return redirect()->back()->with([
            'success' => 'Your comment has been uploaded successfully.',
            'name' => $request->name,
            'email' => $request->email,
        ]);
    }
}
