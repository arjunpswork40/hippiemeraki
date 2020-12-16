<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\FileDestinations;
use App\Http\Helpers\Core\FileManager;
use App\Http\Requests\RoomBookingRequest;
use App\Models\Booked;
use App\Models\Guest;
use App\Models\Room_Details;
use App\Services\PageService;
use App\Models\Room;

use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

use UxWeb\SweetAlert\SweetAlert;
use Razorpay\Api\Api;


class BookingController extends BaseController

{


    protected $_pageService;

    /**
     * Create a new controller instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->middleware('guest');
        $this->addBaseRoute('user');
        $this->addBaseView('user');
        $this->_pageService = new PageService();
    }

   public function availability(Request $request)
   {

// dd($request);
       $checkOne = Room_Details::where('id',$request->category)->first();
        $checkTwo = Booked::where('category_id',$request->category)
        ->wheredate('check_out',$request->checkIn)
        ->sum('booked_room_count');


        $userSelectedDates=['checkIn'=>$request->checkIn,
        'checkOut'=>$request->checkOut];
        $userSelectedcategory=$request->category;
        // dd($userSelectedDates);
        // dd($checkTwo);

        // 'SELECT room_id FROM Bookings WHERE check_in_date<="'.$ci_date.'" AND check_out_date >= "'.$co_date.'") ';

// dd($checkOne);

       if ($checkOne->available_room_count != 0){
           $available=false;
           return $this->renderView($this->getView('booking.index'),compact('checkOne','userSelectedDates','userSelectedcategory','available'),'Available Rooms');
       }
       elseif($checkTwo){
           $checkOne=false;
           $available=false;

        return $this->renderView($this->getView('booking.index'),compact('checkTwo','checkOne','userSelectedDates','userSelectedcategory','available'),'Available Rooms');
       }
       else{
        $checkOne=false;
        $checkTwo-false;
           $available = Room_Details::where('available_room_count','>',0)->get();
        // @dd($available);
        //  $userSelectedcategory;
          return $this->renderView($this->getView('booking.index'),compact('available','checkOne','checkTwo','userSelectedDates','userSelectedcategory'),'Available Rooms');
       }
   }

   public function booking(Request $request)
   {
       $booked = Booked::create([
          'check_in' => $request->check_in,
          'check_out' => $request->check_out,
          'guest_count' => $request->guest_count,
          'category' => $request->category,
          'booked_room_count' => $request->booked_room_count,
          'guest_name' => $request->guest_name,
          'guest_phone_number' => $request->guest_phone_number,
          'guest_permanent_address' => $request->guest_permanent_address,
       ]);
       if ($request->has('guest_ID_proof') && is_file($request->guest_ID_proof)){
           $idProof = FileManager::upload(FileDestinations::ID_PROOF,'guest_ID_proof',FileManager::FILE_TYPE_IMAGE);
           if ($idProof['status']){
               $booked->guest_ID_proof = $idProof['data']['fileName'];

               $booked->save();
           }
       }

       alert()->success('😀 ', 'Room Booking Completed');

       return redirect()->route($this->getRoute('home'));

   }

   public function calculateRoomAmount(Request $request)
   {

        $rate = Room_Details::where('id',$request->categoryId)->select('rate')->first();
        $amount= (float)$rate['rate'] * ((int)$request->roomCount) ;
         return Response::json(['amount' => $amount]);
   }

   private $razorpayId="rzp_test_2zF3MMgHiqDRuS";
   private $razorpayKey="LF2ORGuYFpQCZ24ZtCz2o7tf";

   public function payementInitiation(Request $request)
   {
    //    if($request->has('checkIn') && $request->has('checkOut')){
    //    // Generate random receipt id
    //   $receiptId = Str::random(20);



       $status = Booked::where('receipt_id',$request->receipt_id)->select('status')->first();
    if($status->status === 3)
    {

//dd($request);

  // Create an object of razorpay
    $api = new Api($this->razorpayId, $this->razorpayKey);



    $order = $api->order->create(array(
        'receipt' => $request->receipt_id,
        'amount' => $request->all()['totalAmount'] * 100,
        'currency' => 'INR'
        )
      );






    //   response

    $response=[
        'orderId'=>$order['id'],
        'receipt_id' => $request->receipt_id,
        'razorpayId'=>$this->razorpayId,
        'amount'=>$request->all()['totalAmount']*100,
        'name'=>$request->all()['username'],
        'currency'=>'INR',
        'email'=>$request->all()['email'],
        'contactNumber'=>$request->all()['contactNumber'],
        'address'=>"Wayanad",
        'description'=>'Wayanad'
    ];

    return view('pages.user.booking.payment.payment',compact('response'));
        }
        else{
            return view('pages.user.home.welcome');
        }



   }

   public function paymentConfirmation(Request $request)
   {
    //    dd($request);

      $signatureStatus = $this->SignatureVerify(
            $request->all()['rzpSignature'],
            $request->all()['rzpPaymentId'],
            $request->all()['rzpOrderId']
      );


      if($signatureStatus==true){

        // return view('payment-success-page');
        $booked = Booked::where('order_id',$request->rzpOrderId);
        $booked->update([
            'status' =>1,
            'rzp_payment_id' => $request->rzpPaymentId,
        ]);
        $paymentStatus = "success";
        // alert()->success('😀 ', 'Payed Successfully');
        return $this->renderView($this->getView('home.welcome'), compact('paymentStatus'), 'Home');

      }
      else{
        $paymentStatus = "failed";

        return $this->renderView($this->getView('home.welcome'), compact('paymentStatus'), 'Home');
      }



   }



// In this function we return boolean if signature is correct
private function SignatureVerify($_signature,$_paymentId,$_orderId)
{
    try
    {
        // Create an object of razorpay class
        $api = new Api($this->razorpayId, $this->razorpayKey);
        $attributes  = array('razorpay_signature'  => $_signature,  'razorpay_payment_id'  => $_paymentId ,  'razorpay_order_id' => $_orderId);
        $order  = $api->utility->verifyPaymentSignature($attributes);
        return true;
    }
    catch(\Exception $e)
    {
        // If Signature is not correct its give a excetption so we use try catch
        return false;
    }
}

public function paymentfailed(){
    return $this->renderView($this->getView('payment_status.paymentFailed'), [], 'Home');
}

public function bookingConfirmingView(RoomBookingRequest $request)
{
//    dd($request);
    $amount = Room_Details::where('id',$request->category)->select('rate')->first();

    $totalAmount = (int)$request->roomCount *(float)$amount->rate;
    // dd($totalAmount);
    // Generate random receipt id
    $receiptId = Str::random(20);
    //   save data to db
//    dd($request->idProof);
    $data = Booked::create([
       'check_in' => $request->checkIn,
       'check_out' => $request->checkOut,
       'guest_count' => $request->guestCount,
       'guest_name' => $request->username,
       'booked_room_count' => $request->roomCount,
       'totalPrice' => $totalAmount,
       'guest_phone_number' => $request->contactNumber,
       'email' => $request->email,
       'receipt_id' => $receiptId,
       'category_id' => $request->category,
    ]);


    if ($request->has('idProof') && is_file($request->idProof)){
        $idProof = FileManager::upload(FileDestinations::ID_PROOF,'idProof',FileManager::FILE_TYPE_IMAGE);
        if ($idProof['status']){
            $data->guest_ID_proof = $idProof['data']['fileName'];

            $data->save();
        }
    }


    $categoryName = Room_Details::where('id',$request->category)->select('category')->first();


    return view('pages.user.booking.payment.paymentConfirm',compact('data','categoryName'));




}

}
