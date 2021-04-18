@extends('layouts.adminDashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">✍</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('room-update',$room->id) }}" method="POST" role="form" enctype="multipart/form-data" id="editBlogForm">
            @csrf
            <div class="card-body">
                <div class="form-group primary">
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control-file" value="{{$room->category}}" name="category_name">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Priority</label>
                    <input type="number" class="form-control-file" value="{{$room->priority}}" name="priority">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Rate</label>
                    <input type="number" class="form-control-file" value="{{$room->rate}}" name="rate">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Total Rooms</label>
                    <input type="number" class="form-control-file" value="{{$room->total_room_count}}" name="total_rooms">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Online Bookable Rooms Available (Live value)</label>
                    <input type="number" class="form-control-file" value="{{$room->available_room_count}}" name="total_rooms">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Thumbnail Image</label>
                    <input type="file" class="form-control-file" name="thumbnail_image" accept="image/*" >
                    @error('thumbnail_image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <div class="">
                        <label>Image Preview</label>
                        <img src="{{ \App\Http\Helpers\PageHelper::getRoomsImagePath($room->thumbnail_image) }}" style="width: 10%" alt="">
                    </div>
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>

@endsection
