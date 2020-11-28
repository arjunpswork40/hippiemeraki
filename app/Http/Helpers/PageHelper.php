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
            if (FileManager::checkFileExist($imageName, FileDestinations::BLOG_IMAGES)) {
                $file = FileManager::getFileUrl($imageName, FileDestinations::BLOG_IMAGES);

            }
        }
        return $file;
    }
    public static function getRoomsImagePath($imageName)
    {
        $file = asset('assets/images/placeholder.png');
        if (null != $imageName) {
            if (FileManager::checkFileExist($imageName, FileDestinations::ROOM_IMAGES)) {
                $file = FileManager::getFileUrl($imageName, FileDestinations::ROOM_IMAGES);

            }
        }
        return $file;
    }
}
