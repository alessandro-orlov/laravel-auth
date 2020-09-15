<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::orderBy('created_at', 'desc')->get();
        $user = Auth::user();

        return view('admin.posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationData());

        $data = $request->all();
        // dd($data);

        $new_post = new Post();
        $new_post->user_id = $id = Auth::id();
        $new_post->title = $data['title'];
        $new_post->content = $data['content'];

        if (isset($data['img_path'])) {
          $path = $request->file('img_path')->store('img', 'public');
          $new_post->img_path = $path;
        }

        $new_post->save();

        return redirect()->route('posts.show', $new_post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = Auth::user();
        // dd(strpos($post->img_path,'lorempixel'));
        return view('admin.posts.show', compact('post', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $user = Auth::user();

        // Verifico se lo user che sta accedendo alla risorsa
        // è effettivamente quello che ha creato l'articolo
        if ($post->user_id == $user->id) {
          return view('admin.posts.edit', compact('post'));
        } else {
          abort(403);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $request->validate($this->validationData());
      $data = $request->all();
      // dd($data);

      if (isset($data['img_path'])) {
        $path = $request->file('img_path')->store('img', 'public');
        $post->img_path = $path;
      } else {
        $post->img_path = '';
      }

      $post->update();

      return redirect()->route('admin.posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    public function validationData() {
      return [

        'title' => 'required|max:255',
        'content' => 'required',
      ];
    }
}
