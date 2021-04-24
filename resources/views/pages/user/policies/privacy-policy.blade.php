@extends('layouts.welcomeHome')

@section('content')

<div class="jumbotron text-center policies">
    <h1>Privacy Policy</h1>
     
  </div>

  <div class="row refund-policy">
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h4>HOW WE COLLECT INFORMATION ON YOU</h4>
      <p>In the course of providing, you access to the network, as well as products and services, zubisinn collect and receives personal information in a few ways, often you can choose what information to provide but sometimes we require personal information from you to carry out certain activities such as booking rooms. This section details the ways in which we collect information from you and how that information received   </p>
     </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h3>Booking reservation & contact forms</h3>
      <p>In order to book your stay at our property, we require your personal details. This requires a name associated with your account an email address at which we can contact you, mobile number and additional information including a contact address , a billing address and your credit card information to help confirm your booking. We may collect some of of above personal details through contact forms on network websites in order to get in touch with you about packages or other products and services </p>
     </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h3>Information from third parties</h3>
      <p>We may share personal information with third parties who provides services to zubis inn such as payment processors and advertising service providers, when zubisinn shares your personal information and other collected information with third party services providers we require that they use your information only for the purpose of providing services to us and that their terms are consistent and this privacy policy </p>
     </div>
    <div class="col-md-2"></div>
    <div class="col-md-2"></div>
    <div class="col-md-8">
      <h3>Billing information </h3>
      <p>For product and services requiring payment, we collect a billing name, phone number and email address, we also collect a billing address for invoicing purpose. If you elect to pay by credit card, zubis inn may engage a third part to securely process your payment all payment through website will process by RAZORPAY payment gateway. Zubis inn will store an encrypted token along with the last four digits  of the credit card and the expiration month and year of the card will not store or retain any other billing information about you </p>
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