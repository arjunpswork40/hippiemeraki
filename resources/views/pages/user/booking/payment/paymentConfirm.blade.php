@extends('layouts.welcomeHome')

@section('content')
<style>
.bookingForm{
    display:flex;
    justify-content: space-around;
}

.bookingAmountDetails{
    border: 1px solid #000;
    height: fit-content;
    padding: 16px;

}

.bookedRoomDetails__customerInfo{
    justify-content: center;
}
.bookedRoomDetails__header{
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
    color: #cf8031;
    border-bottom: 2px dashed #cf8031;
}
u{
    color: #8d5c2e;
}


.bookingForm button{

       background: #ff9200;
   width: 200px;
   margin-top: 10px;
   font-weight: 600;
   box-shadow:0 7px 15px -5px #05050594;
   -webkit-transition: box-shadow .2s ease,background-color .2s ease,color .2s ease;
   transition: box-shadow .2s ease,background-color .2s ease,color .2s ease;
   padding: 7px
   }
   .bookingForm button:focus{
       box-shadow: none;
       border:1px dashed #000;

}
.bookingForm button:hover{
   box-shadow: none;
}
.bookedRoomDetails__customerInfoContainer{
    border: 1px solid #e4a06c;
    padding-top: 12px;
}
.bookedRoomDetails__customerInfo{
    flex-direction: column;
    align-items: center;
}

@media only screen and (max-width: 600px) {
.bookedRoomDetails__header{
    font-size: xx-large;
    font-weight: 600;
}
.bookedRoomDetails__customerInfo{
    padding: 4px;
    margin: 10px;
    width: fit-content;
}


}
    </style>



    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="bookedRoomDetails">

            <div class="row bookedRoomDetails__customerInfo">
                <h1 class="bookedRoomDetails__header">Confirm your details</h1>
                <div class="col-lg-6 col-md-6 bookedRoomDetails__customerInfoContainer">
                    <div class="room-item">
                        <img src="{{ \App\Http\Helpers\PageHelper::getRoomsImagePath($categoryName->thumbnail_image) }}" alt="">
                        <div class="ri-text">
                            <h4>{{$categoryName->category}}</h4>
                            {{-- <h3>{{ $data->totalPrice}} Rs<span>/Pernight</span></h3> --}}
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Name:</td>
                                    <td>{{$data->guest_name}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Email:</td>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Mobile No.</td>
                                    <td>{{$data->guest_phone_number}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">No of rooms selected:</td>
                                    <td>{{$data->booked_room_count}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Guest Count:</td>
                                    <td>{{$data->guest_count}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Check In:</td>
                                    <td>{{$data->check_in}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Check Out:</td>
                                    <td>{{$data->check_out}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Total Amount:</td>
                                    <td> <h3>Rs. {{ $data->totalPrice}} <span></span></h3></td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="bookingForm">
                                <form method="POST" action="{{ route('payment-initiation')}}">
                                    @csrf

                                    <input type="hidden" class="totalAmount" name="totalAmount" value="{{ $data->totalPrice}}">
                                    <input type="hidden" class="username" name="username" value="{{$data->guest_name}}">
                                    <input type="hidden" class="email" name="email" value="{{$data->email}}">
                                    <input type="hidden" class="receipt_id" name="receipt_id" value="{{$data->receipt_id}}">
                                    <input type="hidden" class="contactNumber" name="contactNumber" value="{{$data->guest_phone_number}}">
                                    {{-- <input type="number" class="totalAmount" name="totalAmount"> --}}


                                    <button type="submit" class="btn btn-default">Pay Now</button>
                                  </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        </div>
    </section>
    <!-- Rooms Section End -->



@endsection
{{-- @push('scripts')

<script>
$(document).ready(function(){


console.log("working function");
    $(".roomCount").change( function() {
        let amountInfo=$('#totalAmount');
        let categoryId=document.querySelector('.categoryId').value;
        let roomCount=document.querySelector('.roomCount').value;
        console.log(categoryId,roomCount);

    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
            $.ajax({
                url: '{{route("calculateRoomAmount")}}',
                method: 'POST',
                data: {'categoryId':categoryId,'roomCount':roomCount},
                // beforeSend: ()=>{
                //   loaderselector.fadeIn();

                // },
                success: (output)=>{
                    // loaderselector.fadeOut();
                    // console.log(output);

                    // let result=JSON.parse(output);
                    console.log(output);
                    amountInfo.html(output['amount']);
                    $('.totalAmount').val(output['amount']);
                    // if(output['status']=="1"){
                    //     swal("Status Changed!",output['message'], "success",{
                    //         buttons: false,
                    //         timer: 1500,
                    //     });
                    //     window.location.reload();

                    // }else if(output[0]=="error"){
                    //     swal("Failed!",output[1], "error").then(()=>{callback();});

                    // }else{
                    //     // loaderselector.fadeOut();

                    // }

                },
                error:(err)=>{
                    swal("Failed!","Oops Something Went Wrong", "error");

                }

            });
        });



});

</script>

@endpush --}}
