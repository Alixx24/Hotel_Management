<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $fetchRoom = Room::all();
        return view('home.index', compact('fetchRoom'));
    }
    public function room_details($id)
    {
        $fetchRoom = Room::find($id);
        return view('home.room_details', compact('fetchRoom'));
    }

    public function add_booking(Request $request, $id)
    {
        $request->validate([
            'start_date'=> 'required|date',
            'end_date' => 'date|after:start_date',
        ]);
        $data = new Booking;
        $data->room_id = $id;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->save();

        return redirect()->back()->with('message', 'room is added!');

    }
}
