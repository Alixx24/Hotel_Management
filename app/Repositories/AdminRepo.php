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

        $addRoom = new Room();
        $addRoom->room_title = $data['title'];
        $addRoom->description = $data['description'];
        $addRoom->price = $data['price'];
        $addRoom->room_type = $data['room_type'];

        $image = $data['image'];
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $data['image']->move('room', $imagename);
            $addRoom->image = $imagename;
        }

        $addRoom->save();
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
}
