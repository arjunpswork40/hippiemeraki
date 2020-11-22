<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\FileDestinations;
use App\Http\Constants\UserConstants;
use App\Http\Helpers\Core\DateHelper;
use App\Http\Helpers\Core\FileManager;

use App\Http\Models\Service;
use App\Http\Models\User;
use App\Models\Blog;
use App\Services\AdminHomePageService;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Eloquent\Collection;

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

    public function blog()
    {
        $blogs = Blog::all();

        return $this->renderView($this->getView('blog.index'), compact('blogs'), 'Blogs');

    }

    public function blogStore(Request $request)
    {
        $blog = Blog::create([
            'title' => $request['tite'],
            'description' => $request['description'],
            'priority' => $request['priority']
        ]);

        if ($request->has('thumbnail_image') && is_file($request->thumbnail_image)){
            $banner = FileManager::upload(FileDestinations::BLOG_IMAGES,'thumbnail_image',FileManager::FILE_TYPE_IMAGE);
            if ($banner['status']){
                $blog->thumbnail_image = $banner['data']['fileName'];

                $blog->save();
            }
        }
        if ($request->has('banner_image') && is_file($request->banner_image)){
            $banner = FileManager::upload(FileDestinations::BLOG_IMAGES,'banner_image',FileManager::FILE_TYPE_IMAGE);
            if ($banner['status']){
                $blog->banner_image = $banner['data']['fileName'];

                $blog->save();
            }
        }
        return back();
    }


    public function statusUpdate(Request $request)
    {

        // dd($request);
        $blog=Blog::where('id',$request->blog_id)->get();
        // dd($blog);
        $blog->update([
            'title' => "aa",

        ]);



        return response()->json([
            'status'=>'1'
        ]);
    }

    public function blogUpdate(Request $request)
    {

        $blog = Blog::where('id',$request->blog_id);

        $blog->update([
            'title' => $request['tite'],
            'description' => $request['description'],
            'priority' => $request['priority']
        ]);

        return back();
    }

    public function blogDelete($id)
    {
        $blog = Blog::find($id);

        $blog->delete();

        return back();
    }
}
