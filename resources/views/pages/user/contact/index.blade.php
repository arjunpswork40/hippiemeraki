@extends('layouts.welcomeHome')

@section('content')
<section class="contact-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="contact-text">
                    <h2>Contact Info</h2>
                    <p>Feel free to contact us, we are always happy to help you.</p>

                    <table>
                        <tbody>
                        <tr>
                            <td class="c-o"><i class="fa fa-building-o"></i></td>
                            <td>Hotel Zubisinn
                                Red cross road, Near Leo Hospital
                                Kalpetta
                                Wayanad - 673121</td>
                        </tr>
                        <tr>
                            <td class="c-o"> <i class="fa fa-phone"></i></td>
                            <td><a href="tel:+0495 2431313">0495 2431313</a>
                            </td>
                        </tr>
                        <td class="c-o"><i class="fa fa-mobile-phone"></i></td>
                        <td><a href="tel:+91 7034020909">+91 7034020909</a></td>
                    </tr>
                    <tr>
                        <td class="c-o"><i class="fa fa-mobile-phone"></i></td>
                        <td><a href="tel:+91 7796888444">+91 7796888444</a></td>
                    </tr>
                        <tr>
                            <td class="c-o"><i class="fa fa-inbox"></i></td>
                            <td><a href="mailto:info@zubisinn.com">info@zubisinn.com</a></td>
                        </tr>
                        <tr>

                        </tbody>
                    </table>
                </div>
            </div>

                <style>
                    .contact-text .fa{
                        font-size:19px;
                        color: #19191a;
                    }

                    .contact-text a{
                        color:#19191a;
                        font-weight: 600;
                    }
                    .contact-text a:hover{
                        color:#a77026;
                    }
                    .contact-text table tbody tr td{
                        font-weight: 600;
                    }
                    .map{
                        box-shadow: 2px 3px 8px -5px #151d31 !important;
                        height: 280px;
                    }
                    iframe{
                        border-radius: 6px;
                    }
                </style>

            <div class="col-lg-7 offset-lg-1">
                {{-- <form action="#" class="contact-form">
                    <div class="row">
                        <div class="col-lg-6">
                            <input type="text" placeholder="Your Name">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" placeholder="Your Email">
                        </div>
                        <div class="col-lg-12">
                            <textarea placeholder="Your Message"></textarea>
                            <button type="submit">Submit Now</button>
                        </div>
                    </div>
                </form> --}}

                <div class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3908.265555262804!2d76.08240661480832!3d11.604407191762927!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTHCsDM2JzE1LjkiTiA3NsKwMDUnMDQuNSJF!5e0!3m2!1sen!2sin!4v1618727195805!5m2!1sen!2sin"
                        height="280" style="border:0;" allowfullscreen=""></iframe>
                </div>



            </div>
        </div>
        {{-- <div class="map">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3022.0606825994123!2d-72.8735845851828!3d40.760690042573295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89e85b24c9274c91%3A0xf310d41b791bcb71!2sWilliam%20Floyd%20Pkwy%2C%20Mastic%20Beach%2C%20NY%2C%20USA!5e0!3m2!1sen!2sbd!4v1578582744646!5m2!1sen!2sbd"
                height="470" style="border:0;" allowfullscreen=""></iframe>
        </div> --}}
    </div>
</section>


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

@endsection

@push('scripts')
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>

@endpush

