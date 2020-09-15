<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class PostController extends Controller
{
    protected function index()
    {
      // $posts = Post::all();
      $posts = Post::orderBy('created_at', 'desc')->get();
      $user = Auth::user();
      // dd($user);
      return view('posts.index', compact('posts', 'user'));
    }

    protected function show(Post $post)
    {
      return view('posts.show', compact('post'));
    }
}
