<?php

namespace App\Http\Constants;


class PageConstant
{
    const HOME_PAGE = 'home';
    const ROOM_PAGE = 'rooms';
    const ABOUTUS_PAGE = 'about-us';
    const PAGES_PAGE = 'pages';
    const NEWS_PAGE = 'news';
    const CONTACT_PAGE = 'contact';


    const LANG_EN = 'en';
    const LANG_ES = 'es';
    const LANG_FR = 'fr';
    const LANG_DE = 'de';

    const LANGUAGES = [
        self::LANG_EN => 'English',
        self::LANG_ES => 'Spanish',
        self::LANG_FR => 'French',
        self::LANG_DE => 'German',
    ];

}

