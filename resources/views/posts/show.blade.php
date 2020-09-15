@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col">
              <div class="main-container">
                <h1>{{$post->title}}</h1>
                <p>
                  Created {{$post->created_at->format('d/m/Y')}}
                </p>

                {{-- Validazione Immagine --}}
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
                <br>
                <a class="btn btn-secondary" href="{{ route('posts.index') }}">&lt;- Back to posts list</a>
              </div>
          </div>
      </div>
  </div>

@endsection
