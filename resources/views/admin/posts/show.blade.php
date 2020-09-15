@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col">
              <h1>{{$post->title}}</h1>
              <p>
                Created {{$post->created_at->format('d/m/Y')}}
              </p>
              <div>
                <h3>Author:</h3>
                <ul>
                  <li>{{$post->user->name}}</li>
                  <li>{{$post->user->email}}</li>
                </ul>
              </div>
              @if ($post->user_id == $user->id)
                <div class="ms_controls">
                  <a class="btn btn-primary" href="#">edit</a>
                  <form style="display: inline-block;" action="{{route('admin.posts.destroy', $post)}}" method="post">
                    @csrf
                    @method('DELETE')
                      <input class="btn btn-primary" style="background-color: red;" type="submit" value="Delete">
                  </form>
                </div>
              @endif

              @if (!empty($post->img_path))
                <div class="img-box">
                  @if (strpos($post->img_path,'lorempixel'))
                      <img src="{{$post->img_path}}" alt="{{$post->title}}">
                    @else
                      <img src=" {{ asset('storage') . '/' . $post->img_path }} " alt="{{$post->title}}">
                  @endif
                </div>
              @endif

              <p>
                {{$post->content}}
              </p>
              <a href="{{url('/')}}">go back</a>

          </div>
      </div>
  </div>

@endsection
