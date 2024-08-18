<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Hotel;
use App\Models\Room;
use App\Models\Violation;
use App\Models\ViolationName;
use Illuminate\Support\Facades\Auth;

class HomeRepo implements HomeInterface
{
    public function index()
    {
        return Hotel::select('id', 'name', 'region', 'country', 'city','star')->get();
    }

    public function room_details($id)
    {
        return Room::find($id);
    }

    public function add_booking(array $data, $id)
    {
        $booking = new Booking();
        $booking->room_id = $id;
        $booking->name = $data['name'];
        $booking->email = $data['email'];
        $booking->phone = $data['phone'];
        $booking->start_date = $data['start_date'];
        $booking->end_date = $data['end_date'];

        $booking->save();
    }

    public function violation($fetchRoom, $violation)
    {
        $report = new Violation();
        $roomId = (int) $fetchRoom;
        $violationId = (int) $violation;
        $book = new Violation();
        $book->room_id = $roomId;
        $book->user_id = Auth::user()->id;
        $book->violation_id = $violationId;

        $book->save();
    }
    public function fetchViolation()
    {
        return ViolationName::select('id', 'violation')->get();
    }

    public function hotel_details($id) {
       return Hotel::find($id);
    }
}
