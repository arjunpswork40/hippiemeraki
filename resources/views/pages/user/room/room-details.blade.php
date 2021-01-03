@extends('layouts.welcomeHome')
@push('styles')
    <link rel="stylesheet" href="{{ asset('/zubis/css/nice-select.css') }}" type="text/css">
@endpush
@section('content')

    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="hero-text custom-text">
                        <h1>{{$rooms->category}} </h1>
                        <p>A hotel room all to yourself is your idea of a good time</p>
                        {{-- <a href="#" class="primary-btn">Discover Now</a> --}}
                        <div class="box">
                            <div class="inner">
                                <img src="{{ asset('zubis/img/logo/z-logo-full-horizontal.png')  }}" alt="">
                            </div>
                            <div class="inner">
                                <img src="{{ asset('zubis/img/logo/z-logo-full-horizontal.png')  }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                @if($rooms->status == 1)
                <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                    <div class="booking-form">
                        <h3>Book Online</h3>
                        <form action="{{ route('room.bookingFromRoom') }}" method="POST" enctype="multipart/form-data">
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
                @endif

            </div>
        </div>
        <div class="hero-slider owl-carousel img-custom">
            <div class="hs-item set-bg" data-setbg="{{  \App\Http\Helpers\PageHelper::getRoomsImagePath($rooms->thumbnail_image) }}"></div>
{{--            <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/hero-2.jpg') }}"></div>--}}
{{--            <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/hero-3.jpg') }}"></div>--}}
        </div>
    </section>

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
@endsection

