<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        if (Auth::id()) {

            $userType = Auth::user()->usertype;

            if ($userType == 'user') {
                return view('home.index');
            } else if ($userType == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        return view('home.index');
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $data = new Room();
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->room_type = $request->room_type;

        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back();
    }

    public function view_room()
    {
        $fetchRooms = Room::all();
        return view('admin.view_room', compact('fetchRooms'));
    }

    public function delete_room($id)
    {
        $fetchRoom = Room::find($id);
        $fetchRoom->delete();
        return redirect()->back();
    }

    public function update_room($id)
    {
        $fetchRoom = Room::find($id);

        return view('admin.update_room', compact('fetchRoom'));
    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->room_type;


        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back();
    }
}
