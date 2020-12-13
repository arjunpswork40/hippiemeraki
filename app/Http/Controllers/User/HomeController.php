<?php

namespace App\Http\Controllers\User;


use App\Http\Constants\PageConstant;
use App\Http\Models\Service;
use App\Http\Models\UserTimeEntry;

use App\Models\Blog;
use App\Services\PageService;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $paymentStatus="waiting";
//        $pageData = $this->_pageService->getPage(PageConstant::HOME_PAGE);
        return $this->renderView($this->getView('home.welcome'), compact('paymentStatus'), 'Home');
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
        return $this->renderView($this->getView('room.index'),[],'Room');

    }

    public function blog()
    {
        $newses = Blog::all();
        $date = Carbon::now();
        return $this->renderView($this->getView('news.blog'),compact('newses','date'),'News');
    }

    public function details($blog)
    {
        $details = Blog::where('id',$blog)->first();
        return $this->renderView($this->getView('news.blog-details'),compact('details'),'Blog Details');

    }
}
