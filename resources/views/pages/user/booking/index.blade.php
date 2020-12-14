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
    </style>



    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @if($checkOne)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-1.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>{{ $checkOne->category }}</h4>
                            <h3>159$<span>/Pernight</span></h3>
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
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
    
                @elseif($checkTwo)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-2.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>Dou Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Room avilable (These rooms are to beconformed):</td>
                                    <td>{{$checkTwo}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion 5</td>
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
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
            
                @else
                @foreach($available as $available_room)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-3.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4{{ $available_room->category }}</h4>
                            <h3>159$<span>/Pernight</span></h3>
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
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
               @endforeach
                @endif
               
                <div class="col-lg-12">
                    <div class="bookingForm">
                        <form method="POST" action="{{ route('payment-confirming-view')}}">
                            @csrf

                            <input type="number" class="totalAmount" name="totalAmount">
                            <div class="form-group">
                              <label >Category</label>
                              @if ($available)
                              <select  name="category" class="form-control btn btn-lg categoryId" style="display: block">
                                @foreach(App\Http\Constants\RoomCategory::TYPES as $key=>$type)
                                {{-- @dd($userSelectedcategory) --}}
                                @if($key != $userSelectedcategory)
                                <option  value="{{$key}}" >{{$type}}</option>
                                @endif
                                @endforeach
                            </select> 
                            @else
                            <select  name="category" class="form-control btn btn-lg categoryId"  style="display: none">
                                @foreach(App\Http\Constants\RoomCategory::TYPES as $key=>$type)
                                {{-- @dd($userSelectedcategory) --}}
                                <option  value="{{$key}}" {{$userSelectedcategory == $key?'selected':''}} >{{$type}}</option>
                                @endforeach
                            </select> 
                              @endif  
                                                    
                            </div>
                            <div class="form-group">
                                <label >Check In</label>
                            <input type="text" name="checkIn" class="form-control" readonly value="{{$userSelectedDates['checkIn']}}" >
                              </div>
                              <div class="form-group">
                                <label >Check Out</label>
                                <input type="text" name="checkOut" class="form-control" readonly value="{{$userSelectedDates['checkOut']}}">
                              </div>
                            <div class="form-group">
                              <label >Guest Count</label>
                              <input type="number" name="guestCount" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label >Room Count</label>
                                <input type="number" name="roomCount" class="form-control roomCount"  >
                              </div>
                        
                              <div class="form-group">
                                <label >Your Name</label>
                                <input type="text" name="username" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label >Your Phone Number</label>
                                <input type="number" name="contactNumber" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label ><E-></E->mail</label>
                                <input type="email" name="email" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label >Id Proof</label>
                                <input type="file" name="idProof" class="form-control" accept="image/*,.pdf" >
                              </div>
                            
                            <button type="submit" class="btn btn-default">Submit</button>
                          </form>


<div class="bookingAmuountDetails">
    <h3>Total Amount</h3>
    <h4 id="totalAmount"> 458</h4>
</div>





                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->



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
 
@endpush