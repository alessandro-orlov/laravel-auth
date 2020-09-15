@extends('layouts.app')

@section('content')
  <div class="container">
      <div class="row">
          <div class="col">
            <h1>Add an article</h1>

            <form class="" action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
              @csrf
              @method('POST')

                <div class="form-group row">
                    <label for="Title" class="col-md-2 col-form-label text-md-right">Title</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control " name="title" value="" required=""  autofocus="">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Content" class="col-md-2 col-form-label text-md-right">Content</label>
                    <div class="col-md-6">
                        <textarea class="form-control" name="content" rows="8" cols="80"></textarea>
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

          </div>
      </div>
  </div>


@endsection
