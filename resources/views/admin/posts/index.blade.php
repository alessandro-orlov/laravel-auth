@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="row">
          <div class="col">
              <h1>Benvenuto {{$user->name}}</h1>

              <h3>Lista dei toui articoli</h3>
              <ul>
                @foreach ($posts as $post)
                  <li>{{$post->created_at->format('d/m/Y')}} - <b>{{$post->title}}</b>  by {{$post->user->name}}</li>
                @endforeach
              </ul>
          </div>
      </div>
  </div>
@endsection
