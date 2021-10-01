<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //add comment to the post
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->create([
            'user_id' => auth()->id(),
            'body' => request('body')
        ]);

        return back();
    }

    public function destroy(Post $post,Comment $comment)
    {
        $post->comments()->firstWhere('id',$comment->id)->delete();
        return back()->with('success','Your comment has been deleted!');
    }
    public function update(Post $post,Comment $comment)
    {
        request()->validate([
            'body' => 'required'
        ]);

        $post->comments()->firstWhere('id',$comment->id)->update([
            'body' => request('body')
        ]);
        return back();
    }
}
