<?php

namespace App\Http\Controllers\User;

use App\Http\Constants\FileDestinations;
use App\Http\Helpers\Core\FileManager;
use App\Models\Booked;
use App\Models\Guest;
use App\Models\Room_Details;
use App\Services\PageService;
use Carbon\Carbon;
use Illuminate\Http\Request;

use UxWeb\SweetAlert\SweetAlert;

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
           return $this->renderView($this->getView('booking.index'),compact('checkOne','userSelectedDates','userSelectedcategory'),'Available Rooms');
       }
       elseif($checkTwo){
           $checkOne=false;
        return $this->renderView($this->getView('booking.index'),compact('checkTwo','checkOne','userSelectedDates','userSelectedcategory'),'Available Rooms');
       }
       else{
        $checkOne=false;
        $checkTwo-false;
           $available = Room_Details::where('available_room_count','>',0)->get();
        // @dd($available);
         $userSelectedcategory=1;
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

}
