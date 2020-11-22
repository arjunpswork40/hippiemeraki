@extends('layouts.adminDashboard')

@section('content')

    <div class="card">
        <div class="card-header text-right">
            <h3 class="card-title">List of blogs</h3>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Add Blog
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            <form action="{{ route('blog-store') }}" method="POST" role="form" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Title</label>
                                    <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titile">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description</label>
                                    <input type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Desription">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Priority</label>
                                    <input type="number" class="form-control" name="priority" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Priority">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Thumbnail Image</label>
                                    <input type="file" class="form-control-file" name="thumbnail_image" id="exampleFormControlFile1">
                               </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Banner Image</label>
                                    <input type="file" class="form-control-file" name="banner_image" id="exampleFormControlFile1">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
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
            <div class="modal-body text-center">
                <form action="{{ route('blog-store') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
<input type="text" name="blog_id">
                    {{-- <input type="text" class="blog_id"> --}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Title</label>
                        <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Titile">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Description</label>
                        <input type="text" class="form-control" name="description" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Desription">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Priority</label>
                        <input type="number" class="form-control" name="priority" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Priority">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Thumbnail Image</label>
                        <input type="file" class="form-control-file" name="thumbnail_image" id="exampleFormControlFile1">
                   </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Banner Image</label>
                        <input type="file" class="form-control-file" name="banner_image" id="exampleFormControlFile1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary submit">Save changes</button>
                    </div>
                </form>

            </div>

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
                    <th>Banner Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
                    <th>Status</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogs as $key=>$blog)
                    <tr>
                    <td>
                          {{$key+1}}
                    </td>
                    <td><img src="{{ \App\Http\Helpers\Core\FileManager::getImagePath($blog->thumbnail_image) }}" style="width: 25%;display: block">
                    </td>
                    <td><img src="{{ \App\Http\Helpers\Core\FileManager::getImagePath($blog->banner_image) }}" style="width: 25%;display: block"></td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->description }}</td>
                    <td>{{ $blog->priority }}</td>
                    <td>

                        <div class="status-box">
                            <div  class="btn-group status-toggle">
                                <a class="btn btn-primary btn-sm {{ $blog->status !=3? "active":"inActive"}}" data-toggle="{{ $blog->id }}" data-status="1">ON</a>
                                <a class="btn btn-primary btn-sm {{ $blog->status ==3? "active":"inActive"}}" data-toggle="{{ $blog->id }}" data-status="3">OFF</a>
                            </div>
                        </div>

                    </td>
                    <td>
                    <button type="button" class="btn btn-outline-success editElement" data-toggle="modal" data-target="#editBlog" data-id="{{$blog->id}}">
                            View/Edit
                        </button>
                         </td>


                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>id</th>
                    <th>Thumbnail Image</th>
                    <th>Banner Image</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Priority</th>
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
            let status_data={'blog_id':toggle,'value':selected};
            $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
            $.ajax({
                url: '{{route("status-update")}}',
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


 


    </script>


@endpush

