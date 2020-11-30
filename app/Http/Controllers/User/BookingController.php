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
       $check = Room_Details::where('category',$request->category)->first();

       if ($check->available_room_count != 0){
           return $this->renderView($this->getView('check-availability'),['check'],'Available Rooms');
       }
       else{
          $available = Room_Details::where('available_room_count','>',0)->get();
          return $this->renderView($this->getView('check-availability'),compact('check','available'),'Available Rooms');
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
