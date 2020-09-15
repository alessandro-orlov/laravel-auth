@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col">

              <div class="main-container">
                <h1>Add an article</h1>

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


                <form class="" action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                  @csrf
                  @method('POST')

                    <div class="form-group row">
                        <label for="Title" class="col-md-2 col-form-label text-md-right">Title</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control " name="title" value="{{old('title')}}" required=""  autofocus="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="Content" class="col-md-2 col-form-label text-md-right">Content</label>
                        <div class="col-md-6">
                            <textarea class="form-control" name="content" rows="8" cols="80">{{old('content')}}</textarea>
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
                <a class="btn btn-secondary" href="{{ route('posts.index') }}">&lt;- Back to posts list</a>
              </div>

          </div>
      </div>
  </div>


@endsection
