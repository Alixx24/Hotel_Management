<?php

namespace App\Repositories;

use App\Models\Home\Ticket;
use App\Models\Home\TicketCategory;

class TicketRepo implements TicketInterface
{
    public function index()
    {
       return TicketCategory::select('id', 'name')->get();
    }
}
