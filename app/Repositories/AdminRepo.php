<?php

namespace App\Repositories;

use App\Models\Room;

class AdminRepo implements AdminInterface
{
    public function home()
    {
        return Room::all();
    }

    public function add_room(array $data)
    {
        $this->save_room(new Room(), $data);
    }

    public function view_room()
    {
        return Room::all();
    }

    public function delete_room($id)
    {
        $fetchRoom = Room::find($id);
        return  $fetchRoom->delete();
    }

    public function update_room($id)
    {
        return Room::find($id);
    }

    public function edit_room(array $data, $id)
    {
       $room = Room::find($id);
       $this->save_room($room, $data);
    }

    private function save_room(Room $room, array $data)
    {
        $room->room_title = $data['title'];
        $room->description = $data['description'];
        $room->price = $data['price'];
        $room->wifi = $data['wifi'] ?? $room->wifi;
        $room->parking = $data['parking'] ?? $room->parking;
        $room->swimming_pool = $data['swimming_pool'] ?? $room->swimming_pool;
        $room->gym = $data['gym'] ?? $room->gym;
        $room->turkish_bath = $data['turkish_bath'] ?? $room->turkish_bath;
        $room->room_type = $data['room_type'];
        $room->breakfast = $data['breakfast'] ?? $room->breakfast;
        $room->lunch = $data['lunch'] ?? $room->lunch;
        $room->dinner = $data['dinner'] ?? $room->dinner;

        if (!empty($data['image'])) {
            $imagename = time() . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->move(public_path('room'), $imagename);
            $room->image = $imagename;
        }
        $room->save();
    }
}
