@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col">
              <h1>Posts</h1>

              @foreach ($posts as $post)
                <h4><a href="{{route('posts.show', $post)}}">{{$post->title}}</a></h4>
              @endforeach

          </div>
      </div>
  </div>

@endsection
