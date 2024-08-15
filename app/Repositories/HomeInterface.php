<?php

namespace App\Repositories;

interface HomeInterface
{
    function index();
    function room_details($id);
    function add_booking(array $data, $id);
    function violation($id);
}
