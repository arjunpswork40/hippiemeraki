@extends('layouts.welcomeHome')
@push('styles')
<link rel="stylesheet" href="{{ asset('/zubis/css/nice-select.css') }}" type="text/css">
@endpush
@section('content')

<!-- Hero Section Begin -->




<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Zubis Inn </h1>
                    <p>Make yourself at home , Luxury 3 star hotel</p>
                    {{-- <a href="#" class="primary-btn">Discover Now</a> --}}
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form">
                    <h3>Book Online</h3>
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
                                @foreach(App\Http\Constants\RoomCategory::TYPES as $key=>$type)
                                <option value="{{$key}}" >{{$type}}</option>
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
        </div>
    </div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/hero-1.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/hero-2.jpg') }}"></div>
        <div class="hs-item set-bg" data-setbg="{{ asset('/zubis/img/hero/hero-3.jpg') }}"></div>
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
                        <span>About Us</span>
                        {{-- <h2> Zubis INN</h2> --}}
                    </div>
                    <p class="f-para">Zubis Inn is a luxury 3 Star Hotel, located in wayanad, that is widely recognized for providing
                        luxurious accommodations and premium amenities. Designed with luxury rooms , Zubis Inn
                        has been acclaimed as one of the most romantic places in the region.</p>
                        <p class="s-para">Our heartfelt hospitality,
                            impeccable service, fine cuisine, amazing river rafting, and eco-experiences make Zubis Inn
                            the premier destination in Kerala.</p>
                    <a href="#" class="primary-btn about-btn">Read More</a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="about-pic">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="{{ asset('/zubis/img/about/about-1.jpg') }}" alt="">
                        </div>
                        <div class="col-sm-6">
                            <img src="{{ asset('/zubis/img/about/about-2.jpg') }}" alt="">
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
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-026-bed"></i>
                    <h4>Honeymoon Bliss</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon2-family-1"></i>
                    <h4>Family Vacations</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
                            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-001-luggage"></i>
                    <h4>Weekend Holidays</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-044-clock-1"></i>
                    <h4>Outbound Experimental Training Program</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon2-handshake"></i>
                    <h4>Bussiness Travel</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna.</p>
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
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('/zubis/img/room/room-b1.jpg') }}">
                        <div class="hr-text">
                            <h3>Double Room</h3>
                            <h2>199$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
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
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('/zubis/img/room/room-b2.jpg') }}">
                        <div class="hr-text">
                            <h3>Premium King Room</h3>
                            <h2>159$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
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
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('/zubis/img/room/room-b3.jpg') }}">
                        <div class="hr-text">
                            <h3>Deluxe Room</h3>
                            <h2>198$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
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
                <div class="col-lg-3 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="{{ asset('/zubis/img/room/room-b4.jpg') }}">
                        <div class="hr-text">
                            <h3>Family Room</h3>
                            <h2>299$<span>/Pernight</span></h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
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
                        <p>After a construction project took longer than expected, my husband, my daughter and I
                            needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                            city, neighborhood and the types of housing options available and absolutely love our
                            vacation at Zubis Inn Hotel.</p>
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
                        <p>After a construction project took longer than expected, my husband, my daughter and I
                            needed a place to stay for a few nights. As a Chicago resident, we know a lot about our
                            city, neighborhood and the types of housing options available and absolutely love our
                            vacation at Zubis Inn Hotel.</p>
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
        
    document.querySelector('#guest').value="1";
    };

</script>


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
