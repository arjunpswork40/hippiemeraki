<?php

namespace App\Services;

use App\Http\Constants\FileDestinations;
use App\Http\Constants\PageConstant;

use App\Http\Helpers\Core\ImageUpload;

use App\Http\Models\Page;


class PageService
{
    /**
     * Get or create page
     *
     * @param $page
     * @param $lang
     * @return mixed
     */
    public function getPage($page, $lang = PageConstant::LANG_EN)
    {
        return Page::firstOrCreate(
            [
                'name' => $page,
                'lang' => $lang
            ]
        );
    }

    /**
     * Update home page contents
     *
     * @param $data
     */
    public function updateHomePage($data, $lang)
    {
        $pageData = $this->getPage(PageConstant::HOME_PAGE, $lang);
        $pageData->setMeta([
            'section_1_title' => $data['section_1_title'],
            'section_1_sub_title' => $data['section_1_sub_title'],
            'section_1_description' => $data['section_1_description'],
            'section_1_button_text' => $data['section_1_button_text'],
            'section_2_title' => $data['section_2_title'],
            'section_2_sub_title' => $data['section_2_sub_title'],
            'section_2_description' => $data['section_2_description'],

            'section_4_title' => $data['section_4_title'],
            'section_4_sub_title' => $data['section_4_sub_title'],
            'section_4_description' => $data['section_4_description'],

            'section_5_title' => $data['section_5_title'],
            'section_5_sub_title' => $data['section_5_sub_title'],
            'section_5_description' => $data['section_5_description'],

            'item_1_text' => $data['item_1_text'],
            'item_2_text' => $data['item_2_text'],
            'item_3_text' => $data['item_3_text'],
            'section_3_button_text' => $data['section_3_button_text']
        ]);
        if (isset($data['item_1_image'])) {
            $res = ImageUpload::upload(FileDestinations::PAGES_IMAGES, 'item_1_image');
            if ($res['status']) {
                $pageData->setMeta('item_1_image', $res['data']['fileName']);
            }
        }
        if (isset($data['item_2_image'])) {
            $res = ImageUpload::upload(FileDestinations::PAGES_IMAGES, 'item_2_image');
            if ($res['status']) {
                $pageData->setMeta('item_2_image', $res['data']['fileName']);
            }
        }
        if (isset($data['item_3_image'])) {
            $res = ImageUpload::upload(FileDestinations::PAGES_IMAGES, 'item_3_image');
            if ($res['status']) {
                $pageData->setMeta('item_3_image', $res['data']['fileName']);
            }
        }
        $pageData->save();
    }

    public function updateServicePage($data, $lang)
    {
        $pageData = $this->getPage(PageConstant::SERVICE_PAGE, $lang);
        $pageData->setMeta([
            'section_1_title' => $data['section_1_title'],
            'section_1_button_text' => $data['section_1_button_text'],

            'section_2_title' => $data['section_2_title'],
            'section_2_sub_title' => $data['section_2_sub_title'],
            'section_2_description' => $data['section_2_description'],

            'section_3_sub_title' => $data['section_3_sub_title'],
            'section_3_description' => $data['section_3_description'],

            'section_4_sub_title' => $data['section_4_sub_title'],
            'section_4_description' => $data['section_4_description'],

            'section_5_sub_title' => $data['section_5_sub_title'],
            'section_5_description' => $data['section_5_description'],

            'section_6_sub_title' => $data['section_6_sub_title'],
            'section_6_description' => $data['section_6_description'],

            'section_7_sub_title' => $data['section_7_sub_title'],
            'section_7_description' => $data['section_7_description'],
            'section_7_button_text' => $data['section_7_button_text']
        ]);

        if (isset($data['item_1_image'])) {
            $res = ImageUpload::upload(FileDestinations::PAGES_IMAGES, 'item_1_image');
            if ($res['status']) {
                $pageData->setMeta('item_1_image', $res['data']['fileName']);
            }
        }
        $pageData->save();
    }

    public function updateContactUsPage($data, $lang)
    {

        $pageData = $this->getPage(PageConstant::CONTACTUS_PAGE, $lang);
        $pageData->setMeta([
            'section_1_title' => $data['section_1_title'],
            'section_1_sub_title' => $data['section_1_sub_title'],

            'section_2_title' => $data['section_2_title'],
            'section_2_sub_title' => $data['section_2_sub_title'],
            'section_2_description' => $data['section_2_description'],
        ]);
        $pageData->save();
    }

    public function updateTeamPage($data, $lang)
    {
        $pageData = $this->getPage(PageConstant::TEAM_PAGE, $lang);
        $pageData->setMeta([
            'section_1_title' => $data['section_1_title'],
            'section_1_button_text' => $data['section_1_button_text'],

            'section_2_title' => $data['section_2_title'],
            'section_2_sub_title' => $data['section_2_sub_title'],
            'section_2_description' => $data['section_2_description'],

//            'section_3_sub_title' => $data['section_3_sub_title'],
//            'section_3_description' => $data['section_3_description'],
//
//            'section_4_sub_title' => $data['section_4_sub_title'],
//            'section_4_description' => $data['section_4_description'],
//
//            'section_5_sub_title' => $data['section_5_sub_title'],
//            'section_5_description' => $data['section_5_description'],
//
//            'section_6_sub_title' => $data['section_6_sub_title'],
//            'section_6_description' => $data['section_6_description'],
//
//            'section_7_sub_title' => $data['section_7_sub_title'],
//            'section_7_description' => $data['section_7_description'],
            'section_7_button_text' => $data['section_7_button_text']
        ]);

        if (isset($data['item_1_image'])) {
            $res = ImageUpload::upload(FileDestinations::PAGES_IMAGES, 'item_1_image');
            if ($res['status']) {
                $pageData->setMeta('item_1_image', $res['data']['fileName']);
            }
        }
        $pageData->save();
    }

    public function updateHiringPage($data, $lang)
    {
        $pageData = $this->getPage(PageConstant::HIRING_PAGE, $lang);
        $pageData->setMeta([
            'section_1_title' => $data['section_1_title'],
            'section_1_button_text' => $data['section_1_button_text'],

            'section_2_title' => $data['section_2_title'],
            'section_2_sub_title' => $data['section_2_sub_title'],
            'section_2_description' => $data['section_2_description'],

            'section_3_sub_title' => $data['section_3_sub_title'],
            'section_3_description' => $data['section_3_description'],

            'section_4_sub_title' => $data['section_4_sub_title'],
            'section_4_description' => $data['section_4_description'],

//            'section_5_sub_title' => $data['section_5_sub_title'],
//            'section_5_description' => $data['section_5_description'],
//
//            'section_6_sub_title' => $data['section_6_sub_title'],
//            'section_6_description' => $data['section_6_description'],
//
//            'section_7_sub_title' => $data['section_7_sub_title'],
//            'section_7_description' => $data['section_7_description'],
            'section_7_button_text' => $data['section_7_button_text']
        ]);

//        if (isset($data['item_1_image'])) {
//            $res = ImageUpload::upload(FileDestinations::PAGES_IMAGES, 'item_1_image');
//            if ($res['status']) {
//                $pageData->setMeta('item_1_image', $res['data']['fileName']);
//            }
//        }
        $pageData->save();
    }
}
