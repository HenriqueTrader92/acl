<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Post $post)
    {
        // Listando todos os posts
        // $posts = $post->all();

        // Listando posts de determinado usuário
        $posts = $post->where('user_id', auth()->user()->id)->get();

        return view('home', compact('posts'));
        
    }

    public function update($idPost)
    {
        $post = Post::find($idPost);

        $this->authorize('update-post', $post);

        return view('post-update', compact('post'));
    }
}
