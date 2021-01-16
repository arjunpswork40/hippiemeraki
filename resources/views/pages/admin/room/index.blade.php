@extends('layouts.adminDashboard')

@section('content')
    <div class="card">
        <div class="card-header text-right">
{{--            <h3 class="card-title">List of Rooms</h3>--}}
           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
               Add Room Details
           </button>

            <!--New  Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Enter Room Details</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <form  method="POST" action={{ route('room-store') }} role="form" enctype="multipart/form-data" id="newBlogForm">
                                @csrf
                                <div class="form-group primary">
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control-file" name="category_name">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Thumbnail Image</label>
                                    <input type="file" class="form-control-file" name="thumbnail_image" accept="image/*" >
                                    @error('thumbnail_image')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Priority</label>
                                    <input type="number" class="form-control-file" name="priority">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Rate</label>
                                    <input type="number" class="form-control-file" name="rate">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Total Rooms</label>
                                    <input type="number" class="form-control-file" name="total_rooms">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Online bookable rooms</label>
                                    <input type="number" class="form-control-file" name="bookable_rooms">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary submit">Enter</button>
                                </div>
                            </form>

                        </div>

                    </div>
                </div>
            </div>

            {{-- end modal  --}}


            {{-- edit modal  --}}

            <div class="modal fade" id="editBlog" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Edit Blog</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        {{--            <div class="modal-body text-center">--}}
                        {{--                <form action="{{ route('blog-update') }}" method="POST" role="form" enctype="multipart/form-data" id="editBlogForm">--}}
                        {{--                    @csrf--}}
                        {{--<input type="text" name="blog_id">--}}
                        {{--                    --}}{{-- <input type="text" class="blog_id"> --}}
                        {{--                    <div class="form-group">--}}
                        {{--                        <label for="exampleInputEmail1">Title</label>--}}
                        {{--                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titile">--}}
                        {{--                    </div>--}}
                        {{--                    <div class="form-group">--}}
                        {{--                        <label for="exampleInputEmail1">Description</label>--}}
                        {{--                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Desription">--}}
                        {{--                    </div>--}}
                        {{--                    <div class="form-group"--}}
                        {{--                        <label for="exampleInputEmail1">Priority</label>--}}
                        {{--                        <input type="number" class="form-control" name="priority" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Priority">--}}
                        {{--                    </div>--}}
                        {{--                    <div class="form-group">--}}
                        {{--                        <label for="exampleFormControlFile1">Thumbnail Image</label>--}}
                        {{--                        <input type="file" required class="form-control-file" name="thumbnail_image" accept="image/*">--}}
                        {{--                   </div>--}}
                        {{--                    <div class="form-group">--}}
                        {{--                        <label for="exampleFormControlFile1">Banner Image</label>--}}
                        {{--                        <input type="file" required class="form-control-file" name="banner_image" accept="image/*">--}}
                        {{--                    </div>--}}
                        {{--                    <div class="modal-footer">--}}
                        {{--                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                        {{--                        <button type="submit" class="btn btn-primary submit">Update</button>--}}
                        {{--                    </div>--}}
                        {{--                </form>--}}

                        {{--            </div>--}}

                    </div>
                </div>
            </div>

            {{-- end modal  --}}


        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>Thumbnail Image</th>
                    <th>Category Name</th>
                    <th>Rate</th>
                    <th>Total Rooms</th>
                    <th>Online Bookable Rooms Available</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($rooms as $key=>$room)
                    <tr>
                        <td>
                            {{$key+1}}
                        </td>
                        <td>

                            <a href="{{ \App\Http\Helpers\Core\FileManager::getRoomsImagePath($room->thumbnail_image) }}" data-toggle="lightbox"  data-gallery="gallery">

                                <img src="{{ \App\Http\Helpers\Core\FileManager::getRoomsImagePath($room->thumbnail_image) }}" style="width: 25%;display: block" class="img-fluid mb-2">
                                 
                              </a>
                           
                        </td>
                        <td>{{ $room->category}}</td>
                        <td>{{ $room->rate}}</td>
                        <td>{{ $room->total_room_count}}</td>
                        <td>{{ $room->available_room_count}}</td>
                        <td>{{ $room->priority}}</td>
                        <td>

                            <div class="status-box">
                                <div  class="btn-group status-toggle">
                                    <a class="btn btn-primary btn-sm {{ $room->status !=3? "active":"inActive"}}" data-toggle="{{ $room->id }}" data-status="1">ON</a>
                                    <a class="btn btn-primary btn-sm {{ $room->status ==3? "active":"inActive"}}" data-toggle="{{ $room->id }}" data-status="3">OFF</a>
                                </div>
                            </div>

                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('room-edit',$room->id)}}" class="btn btn-outline-success " >
                                    <i class="fas fa-edit"></i>
                                </a> &nbsp;

                                <a href="{{ route('room-delete',$room->id) }}" onclick="return confirm('Are you sure?')" title="delete" class="btn btn-outline-danger"><i class="fas fa-trash"></i> </a>
                            </div>
                        </td>


                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Thumbnail Image</th>
                    <th>Category Name</th>
                    <th>Rate</th>
                    <th>Total Rooms</th>
                    <th>Online Bookable Rooms</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>

@endsection

@push('scripts')

    <script>
        $(function () {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
        $(".table").on('click','.status-box a' , function(e){

            var selected = $(this).data('status');
            var toggle = $(this).data('toggle');
            console.log(toggle);
            $('#'+toggle).prop('value', selected);
            $('a[data-toggle="'+toggle+'"]').not('[data-status="'+selected+'"]').removeClass('active').addClass('inActive');
            $('a[data-toggle="'+toggle+'"][data-title="'+selected+'"]').removeClass('inActive').addClass('active');
            let status_data={'room_id':toggle,'value':selected};
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '{{route("room-status-update")}}',
                method: 'POST',
                data: status_data,
                // beforeSend: ()=>{
                //   loaderselector.fadeIn();

                // },
                success: (output)=>{
                    // loaderselector.fadeOut();
                    console.log(output);

                    // let result=JSON.parse(output);
                    console.log("result is",output);
                    if(output['status']=="1"){
                        swal("Status Changed!",output['message'], "success",{
                            buttons: false,
                            timer: 1500,
                        });
                        window.location.reload();

                    }else if(output[0]=="error"){
                        swal("Failed!",output[1], "error").then(()=>{callback();});

                    }else{
                        // loaderselector.fadeOut();

                    }

                },
                error:(err)=>{
                    swal("Failed!","Oops Something Went Wrong", "error");

                }

            });
        });



        $(".table").on('click','.editElement' , function(e){


            let elementId= e.target.getAttribute('data-id') ;

            let blogIdInput=document.querySelector("#editBlog input[name='blog_id']");
            blogIdInput.value=elementId;

        });

        $('#newBlogForm').on("click", '.submit', function (e) {
            e.preventDefault();
            let title=$('#newBlogForm input[name="category_name"]').val();
            let file=document.querySelector("#newBlogForm input[name=thumbnail_image]").value;
            if(title!="" && file!=""){
                $('#newBlogForm').submit();
            }
            else{
                swal("👀PS !", "Please Fill Title and Image Atlest ! ", "error");
            }
        });
    </script>
@endpush
