<?php

namespace App\Repositories;

use App\Models\Home\Ticket;
use Illuminate\Support\Arr;

Interface TicketInterface {
    function index();
    function create();
    function storeTicket(Ticket $ticket,array $data);
}