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
        $room->wifi = $data['wifi'] ?? $room->wifi; // Assuming wifi is optional
        $room->room_type = $data['room_type'];

        if (!empty($data['image'])) {
            $imagename = time() . '.' . $data['image']->getClientOriginalExtension();
            $data['image']->move('room', $imagename);
            $room->image = $imagename;
        }

        $room->save();
    }
}
