<?php

namespace App\Repositories;

use App\Models\Hotel;

class HotelRepo implements HotelInterface
{

    public function index()
    {
        return dd(Hotel::all());
    }

    public function create()
    {

    }
}