<?php

namespace App\Repositories;

interface HotelInterface {

    function index();
    function create();
    function agentRegisterStore(array $data);
}