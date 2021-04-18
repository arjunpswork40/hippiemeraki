@extends('layouts.welcomeHome')

@section('content')
<!-- About Us Page Section Begin -->
<section class="aboutus-page-section spad">
    <div class="container">
        <div class="about-page-text">
            <div class="row">
                <div class="col-lg-6">
                    <div class="ap-title">
                        <h2>Welcome To Zubis INN.</h2>
                        <p>With captivating visual treats and alluring backdrop, the <b>Zubisinn Hote</b>l gives you a holistic
                            experience of a lifetime. Perfectly positioned at the peak of Wayanad, a UNESCO recognized
                            heritage area with several heritage Sites, some prehistoric, <b>Zubisinn Hotel</b> offers stunning views of
                            the Western Ghats, one of the oldest mountain ranges in the world. Its ever lush green surroundings
                            gleaming with nature’s abundance offers 365 days of beautiful weather and ideal climatic
                            conditions.</p>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <ul class="ap-services">
                        <li><i class="icon_check"></i> 20% Off On Accommodation.</li>
                        <li><i class="icon_check"></i> Complimentary Daily Breakfast</li>
                        <li><i class="icon_check"></i> 3 Pcs Laundry Per Day</li>
                        <li><i class="icon_check"></i> Free Wifi.</li>
                        <li><i class="icon_check"></i> Discount 20% On F&B</li>
                    </ul>
                </div>
                <div class="about-text">
                   <p> If you are a leisure traveller seeking solace from the hectic schedule or treating your
                    family to pure luxury and comfort away from the hustle and bustle of city life,<b>Zubisinn Hotel</b>
                    Offers the perfect destination that fulfills every need of your family. Or, if you are a corporate
                    business traveller seeking achievement on your corporate endeavours, Zubisinn Hotel offers
                    maximum comfort and care that exceeds your highest expectations.
                    <b>Zubisinn Hotel</b>, a Three Star Deluxe offering ideally located tastefully furnished rooms with
                    stunning views. The hotel is ideally located at very close proximity to several internationally
                    recognized tourist and adventure sites and destinations and is accessible by air from the Calicut
                    International Airport – just 54 Kms. away, by train from the Kozhikode Railway Station, just 45
                    Kms. away.</p>
                   <p><b> Zubisinn Hotel</b> offers everything you ever sought from a leisure resort and a city hotel. From
                    rejuvenating, fitness centre and exotic rooms to a lavish multi-cuisine restaurant and function room
                    that can cater to every program, may it be private or corporate. All our accommodation facilities,
                    including the executive rooms, deluxe rooms, junior suits and grand suites have been elegantly
                    designed inspired by traditional Indian culture</p>
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
                    <p>It S Hurricane Season But We Are Visiting Hilton Head Island</p>
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


@endsection
