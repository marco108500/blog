<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;
use Auth;


class CommentsController extends Controller
{
    public function store(Post $post)
    {
        if (Auth::check())
            {
                //Validate the form
                $this->validate(request(),[
                    'body'=> 'required|min:2'
                    ]);

                //Create and save new comment
                $post->addComment(request('body'));

                //Redirect
                return back();
            }
        else
            {
                return redirect('/register')->withErrors([
                    'message' => 'Please register or login to add comments'
                 ]);
            }

    }
}
