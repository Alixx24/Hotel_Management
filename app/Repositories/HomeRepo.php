<?php

namespace App\Repositories;

use App\Models\Booking;
use App\Models\Room;

class HomeRepo implements HomeInterface
{
    public function index()
    {
        return Room::all();
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
}
