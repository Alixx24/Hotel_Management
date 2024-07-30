<?php

namespace App\Repositories;

use App\Models\Hotel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HotelRepo implements HotelInterface
{

    public function index()
    {
        return Hotel::select('id', 'name', 'country', 'city', 'star')->get();
    }

    public function agentRegisterStore(array $data)
    {
        $this->saveAgent(new Hotel(), $data);
    }

    public function checkLoginAgent($credentials)
    {
       return Auth::guard('hotel')->attempt($credentials);
    }

    private function saveAgent(Hotel $hotel, array $data)
    {
        $hotel->email = $data['email'];
        $hotel->name = $data['name'];
        $hotel->region = $data['region'];
        $hotel->country = $data['country'];
        $hotel->city = $data['city'];
        $hotel->star = $data['star'];
        $hotel->number_rooms = $data['number_rooms'];

        $hotel->password = Hash::make($data['password']);
        $hotel->save();
    }
}
