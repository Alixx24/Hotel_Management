<?php

namespace App\Repositories;

interface AdminInterface {

    function home();
    function add_room(array $data);
    function view_room();
    function delete_room($id);
    function update_room($id);
    function edit_room(array $data, $id);
}