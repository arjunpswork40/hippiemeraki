<?php

namespace App\Http\Constants;


class SiteSettingsConstants
{
    const MENU = 'menu';
    const SOCIAL_MEDIA_LINKS = 'social-media-links';

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
