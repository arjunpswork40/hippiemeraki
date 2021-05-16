@extends('layouts.welcomeHome')
{{-- @push('styles')
<link rel="stylesheet" href="{{ asset('/zubis/css/nice-select.css') }}" type="text/css">
@endpush --}}
@section('content')

<!-- Hero Section Begin -->

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


<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                     
                    <h1 class="header__headingPrimary">
                        
                        <div class="star">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star starIcon__last"></i>
                            </div>
                        Zubis Inn</h1>
                    {{-- <img class="imageZubis" src="{{ asset('/zubis/img/logo/Zubis_logo_white.png') }}" alt=""> --}}
                    <p class="header__headingSub">A luxury hotel with 3 star facilities</p>

                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">

                            </div>
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/banner1.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/Landing2.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/Landing3.jpg') }}"></div>
        {{-- <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/banner4.jpg') }}"></div> --}}
    </div>
</section>
<!-- Hero Section End -->
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



<!-- About Us Section Begin -->
<section class="aboutus-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="about-text">
                    <div class="section-title">
                        <span>Why to choose Zubisinn Hotel</span>
                        {{-- <h2> Zubis INN</h2> --}}
                    </div>
                    <p class="f-para">May it be private or corporate. All our accommodation facilities, including the executive rooms,
                        deluxe rooms, junior suits and grand suites have been elegantly designed inspired by traditional
                        Indian culture.</p>
                        <p class="s-para">Unleash the self-healing power of your body. Treat yourself to a touch of luxury and enjoy the
                            great facilities of our wellness centre. We have something for everyone, whether need a specific
                            healing or if you are looking for relaxation and destressing, at our facility you can confidently lower
                            your shoulders and pamper yourself.</p>
                    {{-- <a href="#" class="primary-btn about-btn">Read More</a> --}}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('/zubis/img/about/tent.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('/zubis/img/about/doorway.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Us Section End -->

<!-- Services Section End -->
<section class="services-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>What We Do</span>
                    <h2>Discover Our Packages</h2>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-042-menu"></i>
                    <h4>Advance Booking</h4>
                    <p>Using advance booking facility, you can Reserve your vacation in advance, so you can choose your best room by saving your accommodation expenses, you can enjoy discounts, better availability and you will be better equipped and prepared for anything! </p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-026-bed"></i>
                    <h4>Honeymoon Bliss</h4>
                    <p>We dedicate you a right place to make unforgettable memories, beautiful place to begin your new journey towards life, make your togetherness incredible by world class experience, we specially crafted here to create a blissful romance, and a journey of joyful chapters in life!</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon2-family-1"></i>
                    <h4>Family Vacations</h4>
                    <p>Time you spend with your family are precious because   “a healthy family is a precious  gift of god”, we promise you an valuable experience to make your togetherness to a memorable epoch in your life. </p>
                </div>
            </div>
                            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-001-luggage"></i>
                    <h4>Weekend Holidays</h4>
                    <p>Refresh yourself by taking your weekend with us, we diligence an extra ordinary holiday package specially resolve those who like to take a break and relax   from city sounds , find best weekend deals and offers!</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon2-hiking"></i>
                    <h4>Outbound Experimental Training Program</h4>
                    <p>Shift to the modest side rather expecting the most. Experience the cause of adventure tourism, Adventure team building and games.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon2-handshake"></i>
                    <h4>Bussiness Travel</h4>
                    <p>The days that you travel to and from your location are counted as work days. We concern your working time that’s how conquer premium hotel experience for our relevant business guests.
                        At most we prefer you the best area availability to build up the business works as scheduled by terms.
                        </p>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- Services Section End -->

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                @foreach($roomDeteailsRecent as $room)
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ \App\Http\Helpers\PageHelper::getRoomsImagePath($room->thumbnail_image) }}">
                        <div class="hr-text">
                            <h3>{{ $room->category }}</h3>
                            <h2>{{ $room->rate }}-INR<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                {{-- <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
                                </tr> --}}
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Maximum {{ $room->capacity }} Persons</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>{{ $room->bedType}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>{{ $room->service}}</td>
                                </tr>
                                </tbody>
                            </table>
                            {{-- <a href="#" class="primary-btn">More Details</a> --}}
                        </div>
                    </div>
                </div>
                @endforeach


            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Testimonials</span>
                    <h2>What Customers Say?</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <div class="ts-item">
                        <p>"We had a wonderful stay at Zubis. The environment and the atmosphere helped us to relax. We had a very good stay."</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Ajay</h5>
                        </div>
                        {{-- <img src="{{ asset('/zubis/img/testimonial-logo.png') }}" alt=""> --}}
                    </div>
                    <div class="ts-item">
                        <p>"Had a very relaxed stay. Great service amazing Spa. Lovely building, calming greenery, serene lake. What more could one ask for? We will be back again hopefully."</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Arjun</h5>
                        </div>
                        {{-- <img src="{{ asset('/zubis/img/testimonial-logo.png') }}" alt=""> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

<!-- Blog Section Begin -->
<section class="blog-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Hotel News</span>
                    <h2>Our Blog & Event</h2>
                </div>
            </div>
        </div>
        <div class="row">

            @foreach ($blogs as $blog)


            <div class="col-lg-4">
                <div class="blog-item set-bg" data-setbg="{{ \App\Http\Helpers\PageHelper::getImagePath($blog->thumbnail_image) }}">
                    <div class="bi-text">

                        <h4><a href="{{ route('news.blog-details',$blog->id) }}">{{ $blog->title}}</a></h4>
                        <div class="b-time"><i class="icon_clock_alt"></i> {{ date('F jS, Y', strtotime($blog->created_at))}}</div>
                    </div>
                </div>
            </div>

            @endforeach


        </div>
    </div>
</section>
<!-- Blog Section End -->

@endsection

@push('scripts')
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>


<script>

    window.onload = function() {

    document.querySelector('#guest').value={{$categoryNo->id}};
    };

</script>
@if(Session::has('success'))
<script>
    swal("Good Job","Payment Successfull","success").then(()=>{
            Session::forget('success');
        }
        );
</script>
@endif

@endpush

{{-- @push('payment')




@if($paymentStatus!=="waiting"){

@if($paymentStatus=="success"){
    <script>

        swal("Good Job","Payment Successfull","success").then(()=>{
            window.location.replace('/');
        }
        );
    </script>
}
@elseif ($paymentStatus=="failed"){
    <script>
        swal("Error","Payment Failed","error");

    </script>
}
@endif

}
@endif
@endpush --}}
