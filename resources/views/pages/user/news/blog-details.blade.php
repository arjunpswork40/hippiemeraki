@extends('layouts.welcomeHome')

@section('content')

    <!-- Blog Details Hero Section Begin -->
    <section class="blog-details-hero set-bg" data-setbg="{{ \App\Http\Helpers\PageHelper::getImagePath($details->banner_image) }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="bd-hero-text">
                       
                        {{-- <span>{{ $details->title }}</span> --}}
                        {{-- <h2>{{ $details->title }}</h2> --}}
                        {{-- <ul>
                            <li class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</li>
                            <li><i class="icon_profile"></i> Kerry Jones</li>
                        </ul> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->
    <style> 
  /* .bd-hero-text{
        width: fit-content;
    display: flex;
    justify-content: center;
    margin: 0 auto;
    border-radius: 3px;
    } */

    /* .bd-hero-text h2{
    text-shadow: 2px 1px #2c2c2c; 
    padding: 0 12px;
    border-radius: 2px;
    }  */

    </style>
    <!-- Blog Details Section Begin -->
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="blog-details-text">
                        <div class="bd-title">
                            <h2>{{ $details->title }}</h2>
                        </div>
                        {{-- <div class="bd-pic">
                            <div class="bp-item">
                                <img src="{{ asset('/zubis/img/blog/blog-details/blog-details-1.jpg') }}" alt="">
                            </div>
                            <div class="bp-item">
                                <img src="{{ asset('/zubis/img/blog/blog-details/blog-details-2.jpg') }}" alt="">
                            </div>
                            <div class="bp-item">
                                <img src="{{ asset('/zubis/img/blog/blog-details/blog-details-3.jpg') }}" alt="">
                            </div>
                        </div> --}}
                        <div class="bd-more-text">
                            <div class="bm-item">
                                {{-- <h4>If you live in New York City</h4> --}}
                            <p>{{ $details->description }}</p>
                            </div>
                            {{-- <div class="bm-item">
                                <h4>Every time I hail a cab in New York City</h4>
                                <p>I hope I’ll be lucky enough to get one that’s halfway decent and that the driver
                                    actually speaks English. I have spent many anxious moments wondering if I ever get
                                    to my destination. Or whether I’d get ripped off. Even if all goes well, I can’t say
                                    I can remember many rides in New York cabs that were very pleasant. And given how
                                    much they cost by now, going with a limo makes ever more sense.</p>
                            </div> --}}
                        </div>
                        {{-- <div class="tag-share">
                            <div class="tags">
                                <a href="#">Travel Trip</a>
                                <a href="#">Camping</a>
                                <a href="#">Event</a>
                            </div>
                            <div class="social-share">
                                <span>Share:</span>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-tripadvisor"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div> --}}
                       
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Recommend Blog Section Begin -->
    <section class="recommend-blog-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Recommended</h2>
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
    <!-- Recommend Blog Section End -->



@endsection
