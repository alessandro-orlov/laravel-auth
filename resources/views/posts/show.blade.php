@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col">
              <h1>{{$post->title}}</h1>
              <p>
                Created {{$post->created_at->format('d/m/Y')}}
              </p>
              <div class="">
                <img src="{{$post->img_path}}" alt="{{$post->title}}">
              </div>
              <p>
                {{$post->content}}
              </p>
              <a href="{{url('/')}}">go back</a>



          </div>
      </div>
  </div>

@endsection
