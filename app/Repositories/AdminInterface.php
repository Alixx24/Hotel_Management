<?php

namespace App\Repositories;

interface AdminInterface {

    function home();
    function add_room(array $data);
    function view_room();

}