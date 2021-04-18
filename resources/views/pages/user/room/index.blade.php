@extends('layouts.welcomeHome')

@section('content')
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach($roomDetails as $roomDetail)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item room-custom">
                        {{-- <a href="{{route('room.details',$roomDetail->id)}}"> --}}
                             <img src="{{ \App\Http\Helpers\PageHelper::getRoomsImagePath($roomDetail->thumbnail_image) }}" alt="">
                        {{-- </a> --}}
                            <div class="ri-text">
                            <h4>{{$roomDetail->category}}</h4>
                            <h3>{{ $roomDetail->rate }} Rs<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Available Rooms:</td>
                                    <td>{{$roomDetail->available_room_count}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Maximum {{ $roomDetail->capacity }} Persons </td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>{{ $roomDetail->bedType}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>{{ $roomDetail->service}}</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Room Status:</td>
                                    <td>@if($roomDetail->status == 1)
                                            <span>Available</span>
                                        @else
                                            <span style="color: red">Currently not available</span>
                                        @endif</td>
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
    </section>
    <!-- Rooms Section End -->



@endsection

