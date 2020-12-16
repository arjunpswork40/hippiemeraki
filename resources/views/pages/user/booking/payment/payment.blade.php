<button id="rzp-button1" hidden>Pay</button>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "{{$response['razorpayId']}}", // Enter the Key ID generated from the Dashboard
    "amount": "{{$response['amount']}}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Zubis Inn",
    "description": "Wayanad",
    "image": "{{ asset('/zubis/img/logo/z-logo-full-horizontal.png') }}",
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


<form action="{{ route('payment-confirmation') }}" method="POST"  enctype="multipart/form-data"  >
                       @csrf

    <input type="text" name="receipt_id"  value={{$response['receipt_id']}}>
    <input type="text" name="rzpPaymentId" id="rzpPaymentId">
                       <input type="text" name="rzpOrderId" id="rzpOrderId">
                       <input type="text" name="rzpSignature" id="rzpSignature">




                     <button type="submit" class="btn btn-primary " id="rzpResponseSubmit" >Update</button>
            </form>
