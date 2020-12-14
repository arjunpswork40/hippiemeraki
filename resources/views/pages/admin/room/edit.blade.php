@extends('layouts.adminDashboard')

@section('content')

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form action="{{ route('room-update',$room->id) }}" method="POST" role="form" enctype="multipart/form-data" id="editBlogForm">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Category Name</label><br>
                    <select id="guest" name="category_name" class="btn btn-outline-primary dropdown-item btn-lg">
                        @foreach(App\Http\Constants\RoomCategory::TYPES as $key=>$type)
                            <option value="{{$type}}" {{old('category_name') == $type?'selected':''}}>{{$type}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exampleFormControlFile1">Rate</label>
                    <input type="text" class="form-control-file" name="rate">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Total Rooms</label>
                    <input type="text" class="form-control-file" name="total_rooms">
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
