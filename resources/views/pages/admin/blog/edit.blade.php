@extends('layouts.adminDashboard')

@section('content')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">✍</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="{{ route('blog-update',$blog->id) }}" method="POST" role="form" enctype="multipart/form-data" id="editBlogForm">
        @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Titile</label>
          <input type="text" class="form-control" value="{{$blog->title}}" name="title"  aria-describedby="emailHelp" placeholder="Titile">
          @error('title')

              <div class="text-danger">{{ $message }}</div>
           @enderror
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <textarea type="text" class="form-control"   name="description"  aria-describedby="emailHelp" placeholder="Desription">{{$blog->description}}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Priority</label>
            <input type="number" class="form-control" name="priority" value="{{ $blog->priority }}"  aria-describedby="emailHelp" placeholder="Priority">
            @error('priority')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Thumbnail Image</label>
            <input type="file" class="form-control-file" name="thumbnail_image" accept="image/*" >
            @error('thumbnail_image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="">
                <label>Image Preview</label>
                <img src="{{ \App\Http\Helpers\PageHelper::getImagePath($blog->thumbnail_image) }}" style="width: 10%" alt="">
            </div>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Banner Image</label>
            <input type="file" class="form-control-file" name="banner_image" accept="image/*" >
            @error('banner_image')
            <div class="text-danger">{{ $message }}</div>
            @enderror
            <div class="">
                <label>Image Preview</label>
                <img src="{{ \App\Http\Helpers\PageHelper::getImagePath($blog->banner_image) }}" style="width: 10%" alt="">
            </div>
        </div>


      <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
      </div>
    </form>
  </div>

@endsection
