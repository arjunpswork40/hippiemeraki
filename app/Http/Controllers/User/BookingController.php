<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\FileDestinations;
use App\Http\Helpers\Core\FileManager;
use App\Http\Requests\BookingConformingFormRequest;
use App\Http\Requests\RoomBookingRequest;
use App\Models\Booked;
use App\Models\Guest;
use App\Models\Room_Details;
use App\Services\PageService;
use App\Models\Room;
use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Response;

use UxWeb\SweetAlert\SweetAlert;
use Razorpay\Api\Api;

use Illuminate\Mail\Mailable;
use App\Http\Controllers\User\Mail;
use App\Mail\ConfirmEmail;
use Illuminate\Support\Facades\DB;

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

       $checkOne = Room_Details::where('id',$request->category)
           ->where('status',1)
           ->first();


        $checkTwo = Booked::where('category_id',$request->category)
            ->wheredate('check_out',$request->checkIn)
            ->where('status',1)
            ->sum('booked_room_count');


        $userSelectedDates=['checkIn'=>$request->checkIn,
        'checkOut'=>$request->checkOut];
        $userSelectedcategory=$request->category;
        // dd($userSelectedDates);
        // dd($checkTwo);

        // 'SELECT room_id FROM Bookings WHERE check_in_date<="'.$ci_date.'" AND check_out_date >= "'.$co_date.'") ';


       if ($checkOne->available_room_count > 0){
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
           $available = Room_Details::where('available_room_count','>',0)
               ->where('status',1)
               ->get();
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

        $rate = Room_Details::where('id',$request->categoryId)->select('rate','available_room_count')->first();
        if($rate->available_room_count >= $request->roomCount){
        $amount= (float)$rate['rate'] * ((int)$request->roomCount) ;
         return Response::json(['amount' => $amount]);
        }else{
            return Response::json(['amount' => 'exceeded','roomCount' => $rate->available_room_count]);
        }
   }

   private $razorpayId="rzp_test_2zF3MMgHiqDRuS";
   private $razorpayKey="LF2ORGuYFpQCZ24ZtCz2o7tf";

   public function payementInitiation(Request $request)
   {
    //    if($request->has('checkIn') && $request->has('checkOut')){
    //    // Generate random receipt id
    //   $receiptId = Str::random(20);


       $status = Booked::where('receipt_id',$request->receipt_id)->select('status','booked_room_count','category_id')->first();
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
        'category_id' => $status->category_id,
        'booked_room_count' => $status->booked_room_count,
        'address'=>"Wayanad",
        'description'=>'Wayanad'
    ];

    return view('pages.user.booking.payment.payment',compact('response'));
        }
        else{
            $paymentStatus="waiting";

//            return view('pages.user.home.welcome');
            return $this->renderView($this->getView('home.welcome'), compact('paymentStatus'), 'Home');

        }
   }

   public function paymentConfirmation(Request $request)
   {
    $blogs = Blog::orderBy('id', 'desc')->take(3)->get();

    $status = DB::table('bookeds as b')
            ->select(
                'b.id',
               'b.status',
               'b.booked_room_count',
               'b.category_id',
               'b.email',
               'b.guest_name',
               'b.check_in',
               'b.check_out',
               'b.guest_count',
               'b.guest_phone_number',
               'b.guest_ID_proof',
               'b.totalPrice',
               'b.created_at',
               'b.guest_ID_proof',
               'rd.category'
               )
            ->join('room_details as rd','b.category_id','=', 'rd.id')
            ->where('receipt_id',$request->receipt_id)
            ->first();

    //    $status = Booked::where('receipt_id',$request->receipt_id)
    //     ->select(
    //         'id',
    //        'status',
    //        'booked_room_count',
    //        'category_id',
    //        'email',
    //        'guest_name',
    //        'check_in',
    //        'check_out',
    //        'guest_count',
    //        'booked_room_count',
    //        'guest_phone_number',
    //        'guest_ID_proof',
    //        'totalPrice',
    //        'created_at'
    //        )
    //     ->first();
       if($status->status === 3) {
           $signatureStatus = $this->SignatureVerify(
               $request->all()['rzpSignature'],
               $request->all()['rzpPaymentId'],
               $request->all()['rzpOrderId']
           );
           if ($signatureStatus == true) {
               // return view('payment-success-page');
               $booked = Booked::where('receipt_id', $request->receipt_id);
               $booked->update([
                   'status' => 1,
                   'rzp_payment_id' => $request->rzpPaymentId,
                   'order_id' => $request->rzpOrderId,
               ]);
               $roomCount = Room_Details::where('id', $request->category_id)->first();
               $roomCount->update([
                   'available_room_count' => $roomCount->available_room_count - $request->booked_room_count,
               ]);
               $paymentStatus = "success";
               Session::put('success');
               // alert()->success('😀 ', 'Payed Successfully');


            // mail

            // Mail::send('emails.contact',$data, function ($message) {
            //     $message->from('contact@domainname.com','Zubis Inn');
            //     $message->to('abc123@gmail.com ');
            //     $message->subject('Contact form submitted on domainname.com ');
            //  });

            \Mail::to($status->email)->send(new \App\Mail\ConfirmEmail($status));


            return redirect()->route('clickToContinue');

           }
       }
       else
       {
           $paymentStatus="waiting";
//           return view('pages.user.home.welcome');
        //    return $this->renderView($this->getView('home.welcome'), compact('paymentStatus','blogs'), 'Home');
        return redirect()->route('paymentUnsuccessful');
       }


   }

   public function clickToContinue()
   {
       alert()->success('payment success');

       return view('pages.user.booking.payment.continueToHome');
   }

   public function paymentUnsuccessful()
   {
       alert()->success('payment failed');

       return view('pages.user.booking.payment.paymentFailed');
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

public function bookingConfirmingView(Request $request)
{

//    $rr= $request->validate([
//         'contactNumber'=>'required',
//     ]);

    $amount = Room_Details::where('id',$request->category)->select('rate','available_room_count')->first();

    $totalAmount = (int)$request->roomCount *(float)$amount->rate;

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


    $categoryName = Room_Details::where('id',$request->category)->select('category','thumbnail_image')->first();

    Session::forget('room_details');

    return view('pages.user.booking.payment.paymentConfirm',compact('data','categoryName'));

}

}
