@extends('layouts.welcomeHome')

@section('content')
<style>

.room-item{
    box-shadow: 5px 7px 8px #888888;
}

.bookingForm{
    display:flex;
    justify-content: space-around;

}
 .bookingForm form {
    border: 1px solid #ff9200;
    padding: 16px;
    border-radius: 14px;
    /* box-shadow: 2px 3px 9px -3px #151d31;   */
 }

    .bookingAmountDetails{
    height: 116px;
    width: 100%;
    display: flex;
    color: #fff;
    justify-content: center;
    align-items: center;
    border-radius: 5px;
    background: #d08437;
    box-shadow: 0 0 7px -4px #000;
    margin-bottom: 37px;
    }
    .bookingAmountDetails h3{
        font-weight: 600;
        color: #fff;
    }
    .bookingAmountDetails h4{
        font-weight: 600;
        color: #fff;
    }

.bookingForm__actions{
    display: flex;
    justify-content: center;
}

    .bookingForm__button{

    background: #ff9200;
    width: 200px;
    margin-top: 10px;
    font-weight: 600;
    box-shadow:0 7px 15px -5px #05050594;
    -webkit-transition: box-shadow .2s ease,background-color .2s ease,color .2s ease;
    transition: box-shadow .2s ease,background-color .2s ease,color .2s ease;
    padding: 7px
    }
    .bookingForm__button:focus{
        box-shadow: none;
        border:1px dashed #000;

}
.bookingForm__button:hover{
    box-shadow: none;
}
.form-control:focus {
    border-color: #ff920061;
    box-shadow: 0 0 0 0.2rem #ff92004a;
}
.availableRooms{
    justify-content: space-around;
}
.categoryId{
    border: 1px solid #ff9200;
}
.form-control {
    border: 1px solid #ff9200;
}

.bookingForm__fileUpload{
    padding: 3px 3px 3px 4px;
    overflow: hidden;
}


input{
    caret-color: #ff9200;
}

.checkTwoInfo{
    box-shadow: 2px 3px 8px -3px #151d31;
    margin-top: 102px;
}

/* .rooms-section{
    background-image: url("{{ asset('/zubis/img/vector/payIndex__bg.jpg') }}");
} */

        </style>



    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row availableRooms">
                @if($checkOne)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-1.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>{{ $checkOne->category }}</h4>
                            <h3>{{ $checkOne->rate}} Rs<span>/Pernight</span></h3>

                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">No of rooms available:</td>
                                    <td>{{ $checkOne->available_room_count }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion 3</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>King Beds</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>Wifi, Television, Bathroom,...</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

                @elseif($checkTwo)
                <div class="col-lg-8 col-md-8">
                    <div class="checkTwoInfo">
                        <div class="alert alert-warning" role="alert">
                           The room category you requested is completely occupied and some rooms will be checked out in your check-in date, so contact the hotel at <a href="tel:+0495 2431313">0495 2431313</a> and do the booking.
                          </div>
                    </div>
                </div>

                @else

                @foreach($available as $available_room)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-3.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>{{ $available_room->category }}</h4>
                            <h3>{{ $available_room->rate}} Rs<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Available Room:</td>
                                    <td>{{ $available_room->available_room_count }}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion 2</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>King Beds</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>Wifi, Television, Bathroom,...</td>
                                </tr>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
               @endforeach
                @endif

                <div class="col-lg-12">
                    <div class="bookingForm">
                    @if($checkOne || $available)
                        <form method="POST" role="form" enctype="multipart/form-data" action="{{ route('payment-confirming-view')}}" onsubmit="return validateForm()">
                            @csrf

                            <div class="bookingAmountDetails">
                                <h4>Total Amount &nbsp;</h4>
                                <h4 id="totalAmount"> Rs. 0</h4>
                            </div>

                            <input type="hidden" class="totalAmount" name="totalAmount" value="0">

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">

                                        @if ($available)
                                        <label >Category</label>
                                        <select  name="category" class="form-control btn btn-lg categoryId" style="display: block">
                                          @foreach($available as $availableCategory)
                                          {{-- @dd($userSelectedcategory) --}}
                                          @if($availableCategory->id != $userSelectedcategory)
                                          <option  value="{{$availableCategory->id}}" >{{$availableCategory->category}}</option>
                                          @endif
                                          @endforeach
                                      </select>
                                      @else

                                      <select  name="category" class="form-control btn btn-lg categoryId"  style="display: none">
                                          {{-- @foreach(App\Http\Constants\RoomCategory::TYPES as $key=>$type) --}}
                                          {{-- @dd($userSelectedcategory) --}}
                                          <option  value="{{$checkOne->id}}" {{$userSelectedcategory == $checkOne->id?'selected':''}} >{{$checkOne->category}}</option>
                                          {{-- @endforeach --}}
                                      </select>
                                        @endif

                                      </div>
                                </div>
                             
                              </div>

                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >Check In</label>
                                    <input type="text" name="checkIn" class="form-control" readonly value="{{$userSelectedDates['checkIn']}}" >

                                </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">

                                    <label >Check Out</label>
                                    <input type="text" name="checkOut" class="form-control" readonly value="{{$userSelectedDates['checkOut']}}">
                                </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >Room Count</label>
                                        <input type="number" name="roomCount" class="form-control roomCount" min="1" max="100"  >
                                        @error('roomCount')
                                        <span id="roomCount-error" class="error invalid-feedback" style="display: block">{{$message}}</span>
                                        @enderror
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label >Guest Count</label>
                                        <input type="number" name="guestCount" class="form-control" min="1" max="500" >
                                          @error('guestCount')
                                          <span id="guestCount-error" class="error invalid-feedback" style="display: block">{{$message}}</span>
                                          @enderror
                                      </div>
                                </div>
                              </div>



                              <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label >Your Name</label>
                                        <input type="text" name="username" class="form-control" >
                                          @error('username')
                                          <span id="username-error" class="error invalid-feedback" style="display: block">{{$message}}</span>
                                          @enderror
                                      </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label > Phone Number</label>
                                        <input type="number" name="contactNumber" class="form-control" inputmode="tel"  >
                                          @error('contactNumber')
                                          <span id="contactNumber-error" class="error invalid-feedback" style="display: block">{{$message}}</span>
                                          @enderror
                                      </div>
                                </div>
                              </div>


                              <div class="row">
                                <div class="col">

                              <div class="form-group">
                                <label >E-mail</label>
                                <input type="email" name="email" class="form-control" inputmode="email">

                              </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label >Id Proof</label>
                                        <input type="file" name="idProof" class="form-control bookingForm__fileUpload" accept="image/*,application/pdf" required>
                                      </div>
                                      @error('idProof')
                                      <span id="email-error" class="error invalid-feedback" style="display: block">{{$message}}</span>
                                     @enderror
                                </div>
                              </div>

                              <div class="row bookingForm__actions">
                            <button type="submit" class="btn btn-default btn-block bookingForm__button ">Submit</button>
                              </div>
                          </form>
                        @endif
                    </div>

                </div>
            </div>
        </div>
    </section>
    {{-- <!-- Rooms Section End -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}

@endsection
@push('scripts')

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

                    if(output['amount']=="exceeded"){
                        swal("Room count exceeded!","only "+output['roomCount']+" rooms are available", "warning");
                            document.querySelector('.bookingForm__button').setAttribute("disabled", "disabled");
                            amountInfo.html("Rs. "+"0");

                    }else{
                        amountInfo.html("Rs. "+output['amount']);
                         $('.totalAmount').val(output['amount']);
                        document.querySelector('.bookingForm__button').disabled = false;
                    }
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

function validateForm(){

    var roomCount = document.querySelector('input[name="roomCount"]').value;
    var contactNumber = document.querySelector('input[name="contactNumber"]').value;
    var customerName = document.querySelector('input[name="username"]').value;
    var idProof=document.querySelector('input[name="idProof"]').value;
  if (roomCount == "" || contactNumber=="" || customerName=="" || idProof=="") {
    swal("Some fields seems to be empty","fill all the fields","warning");
    return false;
  }

  let phoneNoPattern = /^\d{10}$/;
  if(!contactNumber.match(phoneNoPattern))
        {


            swal("Enter a valid phone number","only digits are allowed","warning");
            return false;
        }

    let namePattern = /^[a-zA-Z ]*$/;
  if(!customerName.match(namePattern))
        {

            swal("Enter a valid name","only letters are allowed","warning");
            return false;
        }



}


</script>


@endpush

@if($available)
@push('payment')


    <script>

        swal("Room not available","It seems the selected category is completely booked👨‍👩‍👧‍👦! Please select any of the below categories🙂","warning");
    </script>
   
   

@endpush
@endif