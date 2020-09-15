@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col">
              <div class="main-container">
                <h1>Posts</h1>

                @foreach ($posts as $post)
                  <div class="post-list-item">

                    {{-- IMG --}}
                    <div class="list-img">
                      {{-- Validazione Immagine --}}
                      @if (!empty($post->img_path))

                          @if (strpos($post->img_path,'lorempixel'))
                            <a href="{{ $user == null ? route('posts.show', $post) : route('admin.posts.show', $post) }}">
                              <img src="{{$post->img_path}}" alt="{{$post->title}}">
                            </a>
                            @else
                              <a href="{{ $user == null ? route('posts.show', $post) : route('admin.posts.show', $post) }}">
                                <img src=" {{ asset('storage') . '/' . $post->img_path }} " alt="{{$post->title}}">
                              </a>
                          @endif

                      @endif
                    </div>

                    {{-- DESCRIPTION --}}
                    <div class="list-desc">
                      <h3><a href="{{ $user == null ? route('posts.show', $post) : route('admin.posts.show', $post) }}">{{$post->title}}</a></h3>
                      <p>
                        Created: {{$post->created_at->format('d/m/Y')}}
                      </p>
                      <p>
                        By: {{$post->user->name}}
                      </p>
                    </div>
                  </div>

                @endforeach
                <div class="posts-pagination">
                  {{$posts->links()}}
                </div>
              </div>
          </div>
      </div>
  </div>

@endsection
