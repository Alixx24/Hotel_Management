<?php

namespace App\Repositories;

interface HotelInterface {

    function index();
    function agentRegisterStore(array $data);
    function checkLoginAgent($credentials);
    function authGuard();
    function findAgent();
    function edit($id);
}