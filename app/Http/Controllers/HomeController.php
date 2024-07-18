<?php

namespace App\Http\Controllers;

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
}
