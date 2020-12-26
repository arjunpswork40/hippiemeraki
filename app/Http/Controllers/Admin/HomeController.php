<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\FileDestinations;
use App\Http\Constants\UserConstants;
use App\Http\Helpers\Core\DateHelper;
use App\Http\Helpers\Core\FileManager;

use App\Http\Models\Service;
use App\Http\Models\User;
use App\Models\Blog;
use App\Models\Booked;
use App\Models\Room_Details;
use App\Services\AdminHomePageService;
use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\BlogStoreRequest;
use UxWeb\SweetAlert\SweetAlert;



// use Illuminate\Database\Eloquent\Collection;

class HomeController extends BaseController
{


    public function __construct(Request $request)
    {
        parent::__construct($request);
//        $this->addBaseRoute('admin.');
        $this->addBaseView('admin');
    }

    public function bookingManagementTable()
    {
        $bookings = Booked::all();
        return $this->renderView($this->getView('booking.index'), compact('bookings'), 'Booking');

    }

    public function guestDetailsManagement(Booked $booked)
    {
        $details = Booked::where('id',$booked->id)->first();
        return $this->renderView($this->getView('booking.management'), compact('details'), 'Details');
    }

    public function blog()
    {
        $blogs = Blog::all();

        return $this->renderView($this->getView('blog.index'), compact('blogs'), 'Blogs');

    }

    public function blogStore(BlogStoreRequest $request)
    {
        $blog = Blog::create([
            'title' => $request['title'],
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

        alert()->success('😀 ', 'Created Successfully');
        // SweetAlert::message('Welcome back!');
        return back();
    }


    public function statusUpdate(Request $request)
    {
        // dd($request);
        $blog=Blog::where('id',$request->blog_id);
        // dd($blog);
        $blog->update([
            'status' => $request->value,

        ]);



        return response()->json([
            'status'=>'1',
            'message'=>'Status was changed succesfully'
        ]);
    }

    public function blogUpdate(Request $request)
    {
        // dd($request);
        if($request->blog_id){
        $blog = Blog::where('id',$request->blog_id)->firstOrFail();

        $blog->update([
            'title' => $request['title'],
            'description' => $request['description'],
            'priority' => $request['priority']
        ]);

        // if ($request->has('thumbnail_image') && is_file($request->thumbnail_image)){
            $banner1 = FileManager::upload(FileDestinations::BLOG_IMAGES,'thumbnail_image',FileManager::FILE_TYPE_IMAGE);
            if ($banner1['status']){
                $blog->thumbnail_image = $banner1['data']['fileName'];

                $blog->save();
            }
        // }
        // if ($request->has('banner_image') && is_file($request->banner_image)){
            $banner2 = FileManager::upload(FileDestinations::BLOG_IMAGES,'banner_image',FileManager::FILE_TYPE_IMAGE);
            if ($banner2['status']){
                $blog->banner_image = $banner2['data']['fileName'];

                $blog->save();
            }
        // }
        return back();


        return back();
        }
        else{
            return back();
        }
    }

    public function blogDelete($id)
    {
        $blog = Blog::find($id);

        $blog->delete();
        alert()->success(' 🗑', 'Deleted Successfully');


        return back();
    }

    public function checkInOutStatusUpdate(Request $request)
    {
 
        $booked=Booked::where('id',$request->booked_id)->first();
 
      
     
        if($booked->room_status===4){
           
        return response()->json([
            'status'=>'0',
            'message'=>'Room Already Cheked Out'
        ]);

        

        }
        else{

             if($request->value==='4'){
                $roomCount = Room_Details::where('id', $request->categoryId)->first();
                // dd($roomCount);
                $bookedRoomCount = Booked::where('id',$request->booked_id)->select('booked_room_count')->first();
                   $roomCount->update([
                       'available_room_count' => $roomCount->available_room_count + $bookedRoomCount->booked_room_count
                   ]);
    
    
            }

            $booked->update([
                'room_status' => $request->value,
    
            ]);

            return response()->json([
                'status'=>'1',
                'message'=>'Status was changed succesfully'
            ]);
    

        }

       
    }

}
