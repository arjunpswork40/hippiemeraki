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
        .room__message{
            display: flex;
            text-align: center;
            justify-content: center;
        }

        .room__message h2{
            margin-bottom: 30px;
            background: #ff1e1e;
            padding: 6px 21px;
            color: #fff;
            border-radius: 6px;
            font-size: 29px;
            font-weight: 600;
        }
        @media only screen and (max-width: 600px) {
            .room__message h2{
                font-size: 26px;
            }

        }


    </style>



    <div class="bookingForm">
        <form method="POST" role="form" enctype="multipart/form-data" action="{{ route('payment-confirming-view')}}">
            @csrf

            <div class="bookingAmountDetails">
                <h4>Total Amount &nbsp;</h4>
                <h4 id="totalAmount"> Rs. 0</h4>
            </div>

            <input type="hidden" class="totalAmount" name="totalAmount">
            <input type="hidden" class="categoryId" id="categoryId" name="category" value="{{$userSelectedCategory}}">



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
                        <input type="number" name="roomCount" class="form-control roomCount"  >
                        @error('roomCount')
                        <span id="roomCount-error" class="error invalid-feedback" style="display: block">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label >Guest Count</label>
                        <input type="number" name="guestCount" class="form-control" >
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
                        <label >Your Phone Number</label>
                        <input type="number" name="contactNumber" class="form-control" >
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
                        <input type="email" name="email" class="form-control" >

                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label >Id Proof</label>
                        <input type="file" name="idProof" class="form-control bookingForm__fileUpload" accept="image/*,.pdf" required>
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

    </div>


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
                        amountInfo.html("Rs. "+output['amount']);
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
