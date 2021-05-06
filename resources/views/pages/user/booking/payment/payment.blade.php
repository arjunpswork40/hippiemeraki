<h3 class="refresh">Do not refresh this page</h3>
<button id="rzp-button1"  >Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{$response['razorpayId']}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$response['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Zubis Inn",
    "description": "Wayanad",
    "image": "{{ asset('/zubis/img/logo/z-logo-only.png') }}",
    "order_id": "{{$response['orderId']}}", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
    "handler": function (response){

        document.querySelector('#rzpPaymentId').value=response.razorpay_payment_id;
        document.querySelector('#rzpOrderId').value=response.razorpay_order_id;
        document.querySelector('#rzpSignature').value=response.razorpay_signature;

        document.getElementById('rzpResponseSubmit').click();

        // alert(response.razorpay_payment_id);
        // alert(response.razorpay_order_id);
        // alert(response.razorpay_signature)
    },
    "prefill": {
        "name": "{{$response['name']}}",
        "email": "{{$response['email']}}",
        "contact": "{{$response['contactNumber']}}"
    },
    "notes": {
        "address": "Wayanad"
    },
    "theme": {
        "color": "#ec8115"
    }
};
var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
        // alert(response.error.code);
        // alert(response.error.description);
        // alert(response.error.source);
        // alert(response.error.step);
        // alert(response.error.reason);
        // alert(response.error.metadata.order_id);
        // alert(response.error.metadata.payment_id);
});

window.onload=function(){
    document.getElementById('rzp-button1').click();

}
document.getElementById('rzp-button1').onclick = function(e){
    rzp1.open();
    e.preventDefault();
}
</script>


<form action="{{ route('payment-confirmation') }}" method="POST"  enctype="multipart/form-data" hidden  >
                       @csrf
    <input type="text" name="receipt_id"  value={{$response['receipt_id']}}>
    <input type="text" name="category_id"  value={{$response['category_id']}}>
    <input type="text" name="booked_room_count"  value={{$response['booked_room_count']}}>
    <input type="text" name="rzpPaymentId" id="rzpPaymentId">
                       <input type="text" name="rzpOrderId" id="rzpOrderId">
                       <input type="text" name="rzpSignature" id="rzpSignature">

                     <button type="submit" class="btn btn-primary " id="rzpResponseSubmit" >Update</button>
            </form>

            <style type="text/css">
                #rzp-button1{
                  background: #ff9200;
                  color: #fff;
                  border: 0;
                  text-transform: uppercase;
                  cursor: pointer;
                  height: 40px;
                  box-shadow: 2px 3px 8px -3px #151d31;
                  font-size: 16px;
                  border-radius: 2px;
                  padding: 12px 18px;
                  position: absolute;
                    top: 40%;
                    left: 50%;
                    transform: translate(-50%, -50%);

                }
                #rzp-button1:focus{
                  box-shadow: unset;
                  outline: none;

              }
               .refresh{
                display: flex;
                justify-content: center;
               }

              </style>
