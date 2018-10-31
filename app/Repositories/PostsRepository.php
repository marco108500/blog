<?php


namespace App\Repositories;


use App\Post;
use Carbon\Carbon;


class PostsRepository
{
    public function all()
    {
        return Post::all();
    }

    public function CountOfPosts()
    {
        $posts = Post::all();

        $count = count($posts);

        if (filled($count) == false)
            {
                $count = 0;
            }
        return $count;
    }
}
