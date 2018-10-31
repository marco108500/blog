<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Carbon\Carbon;
use App\Repositories\PostsRepository;

class PostsController extends Controller
{
    protected $repo;

    public function __construct(PostsRepository $repository)
    {
        $this->middleware('auth')->except(['index','show']);
        $this->repo = $repository;
    }

    public function index()
    {
        $posts = $this->repo->all();
        $count = $this->repo->CountOfPosts();

        $archives = Post::archives();


        return view('posts.index',compact('posts','count'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //Validate the form
        $this->validate(request(),[
            'title' => 'required',
            'body'  => 'required'
            ]);

        //Create a post, using the request data and Save it to the database
        auth()->user()->publish(
            new Post(request(['title','body']))
            );


        //Then redirect to the home page
        return redirect('/');
    }
}
