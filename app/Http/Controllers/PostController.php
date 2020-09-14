<?php

namespace App\Http\Controllers;
use App\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected function index()
    {
      $posts = Post::all();

      return view('posts.index', compact('posts'));
    }

    protected function show(Post $post)
    {

      return view('posts.show', compact('post'));
    }
}
