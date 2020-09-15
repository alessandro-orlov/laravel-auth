@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col">
              <div class="main-container">
                <h1>{{$post->title}}</h1>

                {{-- Validazione --}}
                {{-- Validazione form --}}
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif

                {{-- EDIT FORM --}}
                <form class="" action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                    <div class="form-group row">
                        <label for="Title" class="col-md-2 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="title" value="{{ old('title') ? old('title') : $post->title }}" required=""  autofocus="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Content" class="col-md-2 col-form-label text-md-right">Content</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="content" rows="8" cols="80">{{ old('content') ? old('content') : $post->content }}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="img" class="col-md-2 col-form-label text-md-right">Select image:</label>
                        <div class="col-md-6">
                            <input type="file" name="img_path" accept="image/*">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-6"></div>
                        <div class="col-2">
                          <input class="btn btn-primary form-control" type="submit" value="Save article">
                        </div>
                    </div>
                </form>
                <br>
                <a class="btn btn-secondary" href="{{ route('admin.posts.show', $post) }}">&lt;- Back to show</a>
              </div>
          </div>
      </div>
  </div>
@endsection
