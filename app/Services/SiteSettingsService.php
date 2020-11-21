<?php

namespace App\Services;

use App\Http\Constants\PageConstant;
use App\Http\Constants\SiteSettingsConstants;

use App\Models\SiteSettings;


class SiteSettingsService
{
    /**
     * Get or create a setting
     *
     * @param $settings
     * @return mixed
     */
    public function getSettings($settings, $lang = PageConstant::LANG_EN)
    {
        return SiteSettings::firstOrCreate(
            [
                'name' => $settings,
                'lang' => $lang
            ]
        );
    }

    /**
     * Update menu
     *
     * @param $data
     */
    public function updateMenu($data, $lang = PageConstant::LANG_EN)
    {
        $settingsData = $this->getSettings(SiteSettingsConstants::MENU, $lang);
        $settingsData->setMeta([
            'menu_1' => $data['menu_1'],
            'menu_2' => $data['menu_2'],
            'menu_3' => $data['menu_3'],
            'menu_4' => $data['menu_4'],
        ]);
        $settingsData->save();
    }

    /**
     * Update social media links
     *
     * @param $data
     */
    public function updateSocialMediaLinks($data)
    {
        $settingsData = $this->getSettings(SiteSettingsConstants::SOCIAL_MEDIA_LINKS);
        $settingsData->setMeta([
            'facebook_url' => $data['facebook_url'],
            'instagram_url' => $data['instagram_url'],
            'twitter_url' => $data['twitter_url'],
            'linked_in_url' => $data['linked_in_url'],
        ]);
        $settingsData->save();
    }

}
