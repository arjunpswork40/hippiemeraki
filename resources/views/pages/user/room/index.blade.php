@extends('layouts.welcomeHome')

@section('content')
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @foreach($roomDetails as $roomDetail)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item room-custom">
                        <a href="{{route('room.details',$roomDetail->id)}}">
                             <img src="{{ \App\Http\Helpers\PageHelper::getRoomsImagePath($roomDetail->thumbnail_image) }}" alt="">
                        </a>
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
                                    <td>Max persion 3</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Bed:</td>
                                    <td>King Beds</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Services:</td>
                                    <td>Wifi, Television, Bathroom,...</td>
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
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-2.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>Deluxe Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
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
                            {{-- <a href="#" class="primary-btn">More Details</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-3.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>Double Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion 2</td>
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
                            {{-- <a href="#" class="primary-btn">More Details</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-4.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>Luxury Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion 1</td>
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
                            {{-- <a href="#" class="primary-btn">More Details</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-5.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>Room With View</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion 1</td>
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
                            {{-- <a href="#" class="primary-btn">More Details</a> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-6.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>Small View</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Size:</td>
                                    <td>30 ft</td>
                                </tr>
                                <tr>
                                    <td class="r-o">Capacity:</td>
                                    <td>Max persion 2</td>
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
                            {{-- <a href="#" class="primary-btn">More Details</a> --}}
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Rooms Section End -->



@endsection

