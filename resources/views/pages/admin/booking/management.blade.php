@extends('layouts.adminDashboard')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">

    <table style="width:100%" class="table  service_tab">
        <tr>
            <th class="thwidth ">Customer Name </th>
            <td class="">{{$details->guest_name}}</td>
        </tr>
        <tr>
            <th class="thwidth ">Customer Mobile </th>
            <td class="">{{$details->guest_phone_number}}</td>
        </tr>
        <tr>
            <th class="thwidth ">Email</th>
            <td class=" ">{{$details->email}}</td>
        </tr>
        <tr>
            <th class="thwidth ">Category</th>
            <td class="">{{ \App\Http\Constants\RoomCategory::TYPES[$details->category_id] }}</td>
        </tr>
        <tr>
            <th class="thwidth ">Booked Rooms</th>
            <td class="">{{$details->booked_room_count}}</td>
        </tr>
        <tr>
            <th class="thwidth ">CheckIn</th>
            <td class="">{{$details->check_in}}</td>
        </tr>
        <tr>
            <th class="thwidth ">CheckOut</th>
            <td class=" ">{{$details->check_out}}</td>
        </tr>

        <tr>
            <th class="thwidth ">ID Proof</th>
            <td class=" ">
                <img src="{{ \App\Http\Helpers\Core\FileManager::getIDImagePath($details->guest_ID_proof) }}" style="width: 25%;display: block">
                </td>
        </tr>
        <tr>
            <th class="thwidth ">Total Amount</th>
            <td class=" ">{{$details->totalPrice}}</td>
        </tr>


        <tr>
            <th class="thwidth">Status </th>
            <td class="status-box">

                <div  class="btn-group status-toggle">
                    <a class="btn btn-primary btn-sm {{ $details->room_status ==3? "active":"inActive"}}" data-toggle="{{ $details->id }}" data-status="3">Pending</a>
                    <a class="btn btn-primary btn-sm {{ $details->room_status ==1? "active":"inActive"}}" data-toggle="{{ $details->id }}" data-status="1">CheckIn</a>
                    <a class="btn btn-primary btn-sm {{ $details->room_status ==4? "active":"inActive"}}" data-toggle="{{ $details->id }}" data-status="4">CheckOut</a>
                </div>

            </td>
        </tr>

        <tr >
            <th class="thwidth">Customer Query  </th>


           <td> Query made by customer on the request  will be shown here, if any !.</td>
        </tr>

    </table>

</div>

@endsection

@push('scripts')
{{--    <script>--}}

{{--        $(".table").on('click','.status-box a' , function(e){--}}

{{--            var selected = $(this).data('status');--}}
{{--            var toggle = $(this).data('toggle');--}}
{{--            console.log(toggle);--}}
{{--            $('#'+toggle).prop('value', selected);--}}
{{--            $('a[data-toggle="'+toggle+'"]').not('[data-status="'+selected+'"]').removeClass('active').addClass('inActive');--}}
{{--            $('a[data-toggle="'+toggle+'"][data-title="'+selected+'"]').removeClass('inActive').addClass('active');--}}
{{--            let status_data={'booked_id':toggle,'value':selected};--}}
{{--            $.ajaxSetup({--}}
{{--                headers: {--}}
{{--                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
{{--                }--}}
{{--            });--}}
{{--            $.ajax({--}}
{{--                url: '{{route("checkinout-status-update")}}',--}}
{{--                method: 'POST',--}}
{{--                data: status_data,--}}
{{--                // beforeSend: ()=>{--}}
{{--                //   loaderselector.fadeIn();--}}

{{--                // },--}}
{{--                success: (output)=>{--}}
{{--                    // loaderselector.fadeOut();--}}
{{--                    console.log(output);--}}

{{--                    // let result=JSON.parse(output);--}}
{{--                    console.log("result is",output);--}}
{{--                    if(output['status']=="1"){--}}
{{--                        swal("Status Changed!",output['message'], "success",{--}}
{{--                            buttons: false,--}}
{{--                            timer: 1500,--}}
{{--                        });--}}
{{--                        window.location.reload();--}}

{{--                    }else if(output[0]=="error"){--}}
{{--                        swal("Failed!",output[1], "error").then(()=>{callback();});--}}

{{--                    }else{--}}
{{--                        // loaderselector.fadeOut();--}}

{{--                    }--}}

{{--                },--}}
{{--                error:(err)=>{--}}
{{--                    swal("Failed!","Oops Something Went Wrong", "error");--}}

{{--                }--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}}

@endpush
