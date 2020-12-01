@extends('layouts.welcomeHome')

@section('content')
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">
            <div class="row">
                @if($checkOne)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-1.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>{{ $checkOne->category }}</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">No of rooms available:</td>
                                    <td>{{ $checkOne->available_room_count }}</td>
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
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
    
                @elseif($checkTwo)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-2.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4>Dou Room</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Room avilable (These rooms are to beconformed):</td>
                                    <td>{{$checkTwo}}</td>
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
            
                @else
                @foreach($available as $available_room)
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img src="{{ asset('/zubis/img/room/room-3.jpg') }}" alt="">
                        <div class="ri-text">
                            <h4{{ $available_room->category }}</h4>
                            <h3>159$<span>/Pernight</span></h3>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o">Available Room:</td>
                                    <td>{{ $available_room->available_room_count }}</td>
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
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
               @endforeach
                @endif
               
                <div class="col-lg-12">
                    <div class="room-pagination">
                        <form >
                            <div class="form-group">
                              <label >Category</label>
                              <select  name="scategory" class="form-control btn btn-lg" style="display: block">
                                @foreach(App\Http\Constants\RoomCategory::TYPES as $key=>$type)
                                {{-- @dd($userSelectedcategory) --}}
                                <option  value="{{$key}}" {{$userSelectedcategory == $key?'selected':''}} >{{$type}}</option>
                                @endforeach
                            </select>                        
                            </div>
                            <div class="form-group">
                                <label >Check In</label>
                            <input type="text" class="form-control" value="{{$userSelectedDates['checkIn']}}" >
                              </div>
                              <div class="form-group">
                                <label >Check Out</label>
                                <input type="text" class="form-control" value="{{$userSelectedDates['checkOut']}}">
                              </div>
                            <div class="form-group">
                              <label >Guest Count</label>
                              <input type="number" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label >Room Count</label>
                                <input type="number" class="form-control" >
                              </div>
                        
                              <div class="form-group">
                                <label >Your Name</label>
                                <input type="text" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label >Your Phone Number</label>
                                <input type="number" class="form-control" >
                              </div>
                              <div class="form-group">
                                <label >Id Proof</label>
                                <input type="file" class="form-control" accept="image/*,.pdf" >
                              </div>
                            
                            <button type="submit" class="btn btn-default">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->



@endsection

