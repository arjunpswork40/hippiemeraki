<?php

namespace App\Http\Controllers\Admin;

use App\Http\Constants\FileDestinations;
use App\Http\Helpers\Core\FileManager;

use App\Models\Room;
use App\Models\Room_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use UxWeb\SweetAlert\SweetAlert;

class RoomController extends BaseController
{

    public function index()
    {
        $rooms = Room_Details::all();

        return $this->renderView($this->getView('admin.room.index'), compact('rooms'), 'Rooms');

    }

    public function statusUpdate(Request $request)
    {

        // dd($request);
        $blog=Room_Details::where('id',$request->room_id);
        // dd($blog);
        $blog->update([
            'status' => $request->value,

        ]);



        return response()->json([
            'status'=>'1',
            'message'=>'Status was changed succesfully'
        ]);
    }

    public function roomStore(Request $request)
    {
        $room = Room_Details::create([
            'category_name' => $request['category_name'],
        ]);

        if ($request->has('thumbnail_image') && is_file($request->thumbnail_image)){
            $banner = FileManager::upload(FileDestinations::ROOM_IMAGES,'thumbnail_image',FileManager::FILE_TYPE_IMAGE);
            if ($banner['status']){
                $room->thumbnail_image = $banner['data']['fileName'];

                $room->save();
            }
        }

        alert()->success('😀 ', 'Created Successfully');
        // SweetAlert::message('Welcome back!');
        return back();
    }

    public function roomDelete($id)
    {
        $room = Room_Details::find($id);

        $room->delete();
        alert()->success(' 🗑', 'Deleted Successfully');


        return back();
    }

    public function roomEdit($id)
    {
        $room = Room_Details::where('id',$id)->first();
        return $this->renderView($this->getView('admin.room.edit'), compact('room'), 'Room Edit');
    }

    public function roomUpdate(Request $request, $id)
    {
        $room = Room_Details::where('id',$id)->firstOrFail();
        $room->update([
            'category_name' => $request['category_name'],
            'rate' => $request['rate'],
            'total_room_count' => $request['total_rooms'],
        ]);

        if ($request->has('thumbnail_image') && is_file($request->thumbnail_image)){
            $banner1 = FileManager::upload(FileDestinations::ROOM_IMAGES,'thumbnail_image',FileManager::FILE_TYPE_IMAGE);
            if ($banner1['status']){
                $room->thumbnail_image = $banner1['data']['fileName'];

                $room->save();
            }
        }
        alert()->success('😀 ', 'Updated Successfully');

        return redirect('admin/room');
    }
}
