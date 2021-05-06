@extends('layouts.welcomeHome')

@section('content')
<!-- About Us Page Section Begin -->
<section class="aboutus-page-section spad">


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
                            @foreach($roomDetails as $roomDetail)
                            <option value="{{$roomDetail->id}}" >{{$roomDetail->category}}</option>
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

    <div class="container">
        <div class="about-page-text">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ap-title">
                        <h2>Welcome To Zubis INN.</h2>
                        <p>With captivating visual treats and alluring backdrop, the <b>Zubis Inn Hotel</b> gives you a holistic
                            experience of a lifetime. Perfectly positioned at the peak of Wayanad, a UNESCO recognized
                            heritage area with several heritage Sites, some prehistoric, <b>Zubisinn Hotel</b> offers stunning views of
                            the Western Ghats, one of the oldest mountain ranges in the world. Its ever lush green surroundings
                            gleaming with nature’s abundance offers 365 days of beautiful weather and ideal climatic
                            conditions.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <ul class="ap-services">
                        <li><i class="icon_check"></i> Spa Service.</li>
                        <li><i class="icon_check"></i> In-room Service</li>
                        <li><i class="icon_check"></i>  Rooftop with Stunning</li>
                        <li><i class="icon_check"></i> Free Wifi.</li>
                        <li><i class="icon_check"></i>Revival Experience</li>
                    </ul>
                </div>


                <div class="col-lg-12 about-text">
                <p><b>  Zubis Inn</b> luxury hotel beckons travellers keeping in mind the pleasing and
                    ecological attributes of the surrounding topography. Utmost priority has been given
                    to maintain the natural habitat of the flora and fauna that are endemic to Wayanad
                    and which makes the hotel premises a 'Heaven of Solace'.</p>
                <p>The elegant interiors of a cosy auberge with all modern aminities provided by <b>Zubis Inn</b>
                     let you have a soothing stay which rejuvenates your soul. Each and every appointed rooms and
                      suites with enough staffs enable us to serve you better.</p>
                <p>Rooms are well furnished and organized with the breathtaking panoramic view of nature which lets
                     you enjoy your sojourn to the fullest.<p>
                <p>We assure you the excellent hospitality of a luxury hotel in Kalpetta which makes you
                    experience Wayanad like never before.</p>
                </div>
            </div>
        </div>
        <div class="about-page-services">
            <div class="row">
                <div class="col-md-4">
                    <div class="ap-service-item set-bg" data-setbg="{{ asset('/zubis/img/about/fam-exe-room2.jpg') }}">
                        <div class="api-text">
                            <h3>Family Executive Room</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ap-service-item set-bg" data-setbg="{{ asset('/zubis/img/about/tent-cropped.jpg')}}">
                        <div class="api-text">
                            <h3>Travel & Camping</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="ap-service-item set-bg" data-setbg="{{asset('/zubis/img/about/interior.jpg') }}">
                        <div class="api-text">
                            <h3>Restaurants Services</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Page Section End -->

<!-- Video Section Begin -->
<section class="video-section set-bg" data-setbg="{{ asset('/zubis/img/hero/banner4.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="video-text">
                    <h2>Discover Our Hotel & Services.</h2>
                    <p> With captivating visual treats and alluring backdrop</p>
                    <a href="https://www.youtube.com/watch?v=EzKkl64rRbM" class="play-btn video-popup"><img
                            src="{{ asset('/zubis/img/play.png') }}" alt=""></a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Video Section End -->

<!-- Gallery Section Begin -->
<section class="gallery-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Our Gallery</span>
                    {{-- <h2>Discover Our Work</h2> --}}
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="gallery-item set-bg" data-setbg="{{ asset('/zubis/img/about/fam-exe-room2.jpg') }}">
                    <div class="gi-text">
                        <h3>Room Luxury</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="{{ asset('/zubis/img/about/interior.jpg') }}">
                            <div class="gi-text">
                                <h3>Restaurant</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="gallery-item set-bg" data-setbg="{{ asset('/zubis/img/about/fam-exe-room2.jpg') }}">
                            <div class="gi-text">
                                <h3>Room Luxury</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="gallery-item large-item set-bg" data-setbg="{{ asset('/zubis/img/about/fam-exe-room1.jpg') }}">
                    <div class="gi-text">
                        <h3>Room Luxury</h3>
                    </div>
                </div>
            </div>
        </div>
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
@push('scripts')
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>
@endpush
