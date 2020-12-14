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
             
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-1.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>{{$categoryName->category}}</h4>
                            <h3><span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">No of rooms selected:</td>
                                    <td>{{$data->booked_room_count}}</td>
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
                                    <td class="r-o">Total Price:</td>
                                    <td>{{$data->totalPrice}}</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
    
                 
          
               
                <div class="col-lg-12">
                    <div class="bookingForm">
                        <form method="POST" action="{{ route('payment-initiation')}}">
                            @csrf

                            <input type="number" class="totalAmount" name="totalAmount" value="{{ $data->totalPrice}}">
                            <input type="text" class="totalAmount" name="username" value="{{$data->guest_name}}">
                            <input type="text" class="totalAmount" name="email" value="{{$data->email}}">
                            <input type="number" class="totalAmount" name="contactNumber" value="{{$data->guest_phone_number}}">
                            {{-- <input type="number" class="totalAmount" name="totalAmount"> --}}
                           
                            
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