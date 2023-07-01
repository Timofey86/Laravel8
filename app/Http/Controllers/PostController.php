<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::query()->orderBy('created_at', 'DESC')->paginate(3); //collection object

        //dd($posts);
        return view('posts.index',['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::query()->findOrFail($id);
        return view('posts.show',['post' => $post]);
    }
}
