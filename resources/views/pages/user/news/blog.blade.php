@extends('layouts.welcomeHome')

@section('content')
{{-- <span class="b-tag">{{$news->title}}</span> --}}
    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                @foreach($newses as $news)
                <div class="col-lg-4 col-md-6">
                    <div class="blog-item set-bg" data-setbg="{{ \App\Http\Helpers\PageHelper::getImagePath($news->thumbnail_image) }}">
                        <div class="bi-text">
                            {{-- <span class="b-tag">{{$news->title}}</span> --}}
                            <h4><a href="{{ route('news.blog-details',$news->id) }}"  >{{$news->title}}</a></h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> {{ date('F jS, Y', strtotime($news->created_at))}}</div>

                        </div>
                    </div>
                </div>
             

                @endforeach

                {{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-2.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Camping</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">Choosing A Static Caravan</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 15th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-3.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Event</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">Copper Canyon</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 21th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-4.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Trivago</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">A Time Travel Postcard</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 22th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-5.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Camping</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">A Time Travel Postcard</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 25th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-6.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Travel Trip</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">Virginia Travel For Kids</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 28th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-7.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Travel Trip</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">Bryce Canyon A Stunning</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 29th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-8.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Event & Travel</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">Motorhome Or Trailer</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-4 col-md-6">--}}
{{--                    <div class="blog-item set-bg" data-setbg="{{ asset('/zubis/img/blog/blog-9.jpg') }}">--}}
{{--                        <div class="bi-text">--}}
{{--                            <span class="b-tag">Camping</span>--}}
{{--                            <h4><a href="{{ route('news.blog-details') }}">Lost In Lagos Portugal</a></h4>--}}
{{--                            <div class="b-time"><i class="icon_clock_alt"></i> 30th April, 2019</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                {{-- <div class="col-lg-12">
                    <div class="load-more">
                        <a href="#" class="primary-btn">Load More</a>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    <!-- Blog Section End -->


@endsection
