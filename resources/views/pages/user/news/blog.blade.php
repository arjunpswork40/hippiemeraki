@extends('layouts.welcomeHome')

@section('content')
{{-- <span class="b-tag">{{$news->title}}</span> --}}
    <!-- Blog Section Begin -->
    <section class="blog-section blog-page spad">
        <div class="container">
            <div class="row">
                @foreach($newses as $news)
                <div class="col-lg-4 col-md-6">
                <a href="{{ route('news.blog-details',$news->id) }}"  >
                    <div class="blog-item set-bg" data-setbg="{{ \App\Http\Helpers\PageHelper::getImagePath($news->thumbnail_image) }}">
                        <div class="bi-text">
                            {{-- <span class="b-tag">{{$news->title}}</span> --}}
                            <h4>{{$news->title}}</h4>
                            <div class="b-time"><i class="icon_clock_alt"></i> {{ date('F jS, Y', strtotime($news->created_at))}}</div>

                        </div>
                    </div>
                    </a>
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
    </section>
    <!-- Blog Section End -->


@endsection
@push('scripts')
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>


@endpush