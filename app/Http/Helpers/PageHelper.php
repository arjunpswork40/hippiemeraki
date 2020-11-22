<?php
/**
 * Created By: Sanjay KV
 * Date: 22/09/20
 * Time: 12:16 PM
 * File: PageHelper.php
 */

namespace App\Http\Helpers;


use App\Http\Constants\FileDestinations;
use App\Http\Helpers\Core\FileManager;

class PageHelper
{
    public static function getImagePath($imageName)
    {
        $file = asset('assets/images/placeholder.png');
        if (null != $imageName) {
            if (FileManager::checkFileExist($imageName, FileDestinations::PAGES_IMAGES)) {
                $file = FileManager::getFileUrl($imageName, FileDestinations::PAGES_IMAGES);
            }
        }
        return $file;
    }
}
