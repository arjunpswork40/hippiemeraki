<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\OrderConstants;
use App\Http\Constants\UserConstants;
use App\Http\Helpers\Core\DateHelper;
use App\Http\Models\ContactUs;
use App\Http\Models\Executive;
use App\Http\Models\Order;

use App\Http\Models\Service;
use App\Http\Models\User;
use App\Services\AdminHomePageService;
use App\Services\ContactUsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class HomeController extends BaseController
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
//        $this->addBaseRoute('admin.');
        $this->addBaseView('admin');
    }

    public function booking()
    {
        return $this->renderView($this->getView('booking.index'), [], 'Booking');

    }

}
