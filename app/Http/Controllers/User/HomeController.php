<?php

namespace App\Http\Controllers\User;


use App\Http\Constants\PageConstant;
use App\Http\Models\Service;
use App\Http\Models\UserTimeEntry;

use App\Models\Blog;
use App\Models\Room_Details;
use App\Services\PageService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends BaseController
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $paymentStatus="success";
        $blogs = Blog::orderBy('id', 'desc')->take(3)->get();
        $roomDetails = Room_Details::where('status',1)->select('category','id')->get();
        $roomDeteailsRecent = Room_Details::where('status', 1)->orderBy('priority')->take(4)->get();
        $categoryNo = Room_Details::where('status',1)->select('category','id')->first();
//        $pageData = $this->_pageService->getPage(PageConstant::HOME_PAGE);
        return $this->renderView($this->getView('home.welcome'), compact('blogs','roomDeteailsRecent','roomDetails','categoryNo'), 'Home');
    }

    /**
     * About US page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function aboutUs()
    {
        return $this->renderView($this->getView('about-us.index'),[],'About US');
    }

    /**
     * Contact page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function contact()
    {
        return $this->renderView($this->getView('contact.index'),[],'Contact');
    }

    /**
     * Room page
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function room()
    {
        $roomDetails = Room_Details::where('status',1)->orderBy('priority','asc')->get();
        return $this->renderView($this->getView('room.index'),compact('roomDetails'),'Room');

    }

    public function blog()
    {
        $newses = Blog::where('status',1)->orderBy('priority','asc')->get();
        $date = Carbon::now();
        return $this->renderView($this->getView('news.blog'),compact('newses','date'),'News');
    }

    public function details($blog)
    {

        $blogs = Blog::orderBy('id', 'desc')->take(3)->get();
        $details = Blog::where('id',$blog)->first();
        return $this->renderView($this->getView('news.blog-details'),compact('details','blogs'),'Blog Details');

    }

    public function roomDetails(Room_Details $roomDetails)
    {
        $rooms = Room_Details::where('id',$roomDetails->id)->first();
        Session::put('room_details',$rooms);
        return $this->renderView($this->getView('room.room-details'), compact('rooms'), 'Room Details');
    }

    public function BookingFromRoom(Request $request)
    {
        $userSelectedDates=['checkIn'=>$request->checkIn,
            'checkOut'=>$request->checkOut];
        $userSelectedCategory = Session::get('room_details')->id;
        return $this->renderView($this->getView('room.online-booking'), compact('userSelectedDates','userSelectedCategory'), 'Room Details');

    }
}
