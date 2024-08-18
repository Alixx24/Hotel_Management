<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use App\Repositories\HomeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private HomeInterface $repo;
    public function __construct(HomeInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $fetchHotel = $this->repo->index();
        return view('home.index', compact('fetchHotel'));
    }
    public function room_details($id)
    {
        $fetchRoom = $this->repo->room_details($id);
        $fetchViolations = $this->repo->fetchViolation();
        return view('home.room_details', compact('fetchRoom', 'fetchViolations'));
    }

    public function add_booking(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date',
        ]);
        $data = $this->repo->add_booking($data, $id);

        return redirect()->back()->with('message', 'room is added!');
    }

    public function hotel_details($id)
    {
        $fetchHotel = $this->repo->hotel_details($id);
        $fetchViolations = $this->repo->fetchViolation();
        return view('home.hotel_details', compact('fetchHotel', 'fetchViolations'));
    }

    public function violation($fetchRoom,$violation)
    {
        $this->repo->violation($fetchRoom,$violation);
        return redirect()->back()->with('message', 'The Report Was Sent Successfully');
    }
}
