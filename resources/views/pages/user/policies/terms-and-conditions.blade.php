@extends('layouts.welcomeHome')

@section('content')

<div class="jumbotron text-center policies">
    <h1>Terms and conditions</h1>
    <p>
      Please read these terms and conditions carefully before using this site.
      This is a binding legal agreement. By accessing and continuing to use
      the site, you agree to each and every one of these terms and conditions.
      Please do not use the site if you do not agree to each and every one of
      these terms and conditions.
    </p>
  </div>

  <div class="row refund-policy">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h3>Check-out Policy</h3>
      <p>1. Check out time: 12:00 Noon.</p>
      <p>
        2. Half day room charge is applicable until stay up to 6 p.m. based on
        availability of room
      </p>
      <p>3. After 6 P.M full day room charge is applicable.</p>
      <p>
        4. Late Checkout is negotiable and based on availability and
        confirmation from Front Desk.
      </p>
      <p>5. Government approved identity card mandatory for check inns.</p>
      <p>6. covid protocols mandatory as statutory.</p>
      <p>7. government taxes as per policy.</p>
    </div>
    <div class="col-md-2"></div>
  </div>
  <div class="row refund-policy">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h3>Cancellation Policy</h3>
      <p>
        1. If cancellation is made within 72 hrs. than 25% of room rent is to
        payable.
      </p>
      <p>
        2. If cancellation is made within 48 hrs. than 50 % of room rent is to
        payable.
      </p>
      <p>3. If there is no show than one night room rent is to payable.</p>
      <p>4. No cancellation charge if cancelation is made before 72 hrs.</p>

      <p>• Hotel Reservations</p>
      <p>
        The reservations feature of the Site is provided solely to assist
        customers in determining the availability of travel related services
        and products and to make legitimate reservations and for no other
        purpose. You warrant that you are at least 18 years of age, possess
        the legal authority to enter into the legal agreement constituted by
        your acceptance of these conditions and to use the Site in accordance
        with such conditions. You agree to be financially responsible for your
        use of the Site including without limitation for all reservations made
        by you or on your account for you, whether authorised by you or not.
        For any reservations or other services for which fees may be charged
        you agree to abide by the terms or conditions of supply including
        without limitation payment of all moneys due under such terms or
        conditions. The Site contains details of hotel charges and room rates
        (including any available special offers) for hotels and resorts owned
        or managed by zubis inn kalpetta. Hotel reservation terms and
        conditions of booking are set out on the Site and payment will be in
        accordance with the procedure set out in such terms and conditions.
        You undertake that all details you provide to in connection with any
        services or products which may be offer by zubis inn Hotels Ltd on the
        Site (including hotel room reservations) will be correct and, where
        applicable, the credit card which you use is your own and that there
        are sufficient funds to cover the cost of any services or products
        which you wish to purchase. Zubis inn reserves the right to obtain
        validation of your credit card details before providing you with any
        services or products
      </p>
      <p>• General</p>
      <p>
        zubis Inn Hotels Ltd does not accept any liability for any failure to
        comply with these conditions where such failure is due to
        circumstances beyond its reasonable control. If any of these
        conditions are invalid, unenforceable or illegal for any reason, the
        remaining conditions shall nevertheless continue in full force. You
        are completely responsible for all charges, fees, duties, taxes and
        assessments arising out of the use of the Site.
      </p>
      <p>• Governing Law & Jurisdiction</p>
      <p>
        These conditions are governed by the laws in force in India and you
        agree to submit to the exclusive jurisdiction of the courts of India.
      </p>
    </div>
    <div class="col-md-2"></div>
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
  @endsection
@push('scripts')
<script src="{{ asset('/zubis/js/jquery.nice-select.min.js') }}"></script>

@endpush
