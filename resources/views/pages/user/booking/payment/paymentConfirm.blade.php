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
        <img class="confrmPage-left-img" src="{{ asset('zubis/img/vector/vectorw.svg') }}">
        <img class="confrmPage-right-img" src="{{ asset('zubis/img/vector/vectorw2.svg') }}">
            <div class="bookedRoomDetails">

            <div class="row bookedRoomDetails__customerInfo">
                <h1 class="bookedRoomDetails__header">Confirm And Proceed</h1>
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
                                    <td class="r-o">Number of rooms selected:</td>
                                    <td>{{$data->booked_room_count}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Number Of Pax:</td>
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
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
          <div class="modal-header">
            <h3>Book Online</h3>
            <span class="close">&times;</span>
          </div>
          <div class="modal-body">
            <div class="booking-form">
             <form action="{{route('checkAvailability')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{-- @method('put') --}}
                    <div class="check-date">
                        <label for="date-in">Check In:</label>
                        <input type="text" class="date-input" id="date-in" name="checkIn" onchange="checkEnteredDate()" autocomplete="off">
                        <i class="icon_calendar"></i>
                    </div>
                    <div class="check-date">
                        <label for="date-out">Check Out:</label>
                        <input type="text" class="date-input" id="date-out" name="checkOut" onchange="checkEnteredDate()" autocomplete="off">
                        <i class="icon_calendar"></i>
                    </div>
                    <div class="select-option">
                        <label for="guest">Room Category:</label>
                        <select id="guest" name="category">
                            @foreach($roomDetailsForAvailability as $roomDetailAvailabile)
                            <option value="{{$roomDetailAvailabile->id}}" >{{$roomDetailAvailabile->category}}</option>
                            @endforeach
                        </select>
                    </div>
                    {{-- <div class="select-option">
                        <label for="room">Room:</label>
                        <select id="room">
                            <option value="">1 Room</option>
                            <option value="">2 Room</option>
                        </select>
                    </div> --}}
                    <button id="checkAvailabilityButton" type="submit" disabled >Select Dates</button>
                </form>
            </div>
          </div>
          <div class="modal-footer">
            {{-- <h3>Zubis Inn</h3> --}}
          </div>
        </div>

      </div>
       <!-- Page Preloder -->
       <div id="preloder">
        <div class="loader"></div>
    </div>

<script>

function checkEnteredDate(){
    let checkIn=document.querySelector('#date-in').value;
    let checkOut=document.querySelector('#date-out').value;
    let checkButton=document.querySelector('#checkAvailabilityButton');
    console.log(checkOut);
if(checkIn!=="" && checkOut!="")
{
if(checkIn>checkOut){

    swal("Oops !","Check-In 📅 should be smaller than Check-Out date","error");
    checkButton.setAttribute("disabled", "");
    checkButton.innerHTML="Select Dates";
    checkButton.style.cssText=`border: 1px solid #dfa974;
    color: #dfa974;
    font-weight: 500;
`;

}
else{
    checkButton.removeAttribute('disabled');
    checkButton.style.cssText=`border: 3px solid #f98f28;color: #d37c27;
    font-weight: 700`;
    checkButton.innerHTML="Check Availability";
}

}

}
</script>
    </section>
    <!-- Rooms Section End -->



@endsection
@push('scripts')
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>
@endpush
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
