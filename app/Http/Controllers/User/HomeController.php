<?php

namespace App\Http\Controllers\User;


use App\Http\Constants\PageConstant;
use App\Http\Models\Service;
use App\Http\Models\UserTimeEntry;

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
        $this->addBaseRoute('home');
        $this->addBaseView('home');
        $this->_pageService = new PageService();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
//        $pageData = $this->_pageService->getPage(PageConstant::HOME_PAGE);
        return $this->renderView($this->getView('welcome'), [], 'Home');
    }

}
