<?php


namespace App\Http\Controllers\User;

use App\Http\Constants\SiteSettingsConstants;

use App\Http\Controllers\Controller;

use App\Services\SiteSettingsService;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;


class BaseController extends Controller
{

    public function __construct(Request $request)
    {
        parent::__construct($request);
        $this->_view = 'pages.user.';
        View::share('menu', (new SiteSettingsService())->getSettings(SiteSettingsConstants::MENU));
        View::share('socialMediaLinks', (new SiteSettingsService())->getSettings(SiteSettingsConstants::SOCIAL_MEDIA_LINKS));
    }

}
