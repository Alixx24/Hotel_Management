<?php

namespace App\Repositories;

use App\Models\Home\Ticket;
use App\Models\Home\TicketCategory;
use Illuminate\Support\Facades\Auth;

class TicketRepo implements TicketInterface
{
    public function index()
    {
       return TicketCategory::select('id', 'name')->get();
    }
    
    public function storeTicket(Ticket $ticket,array $data)
    {
       

        $ticket->subject = $data['subject'];
        $ticket->description = $data['description'];
        $ticket->user_id = Auth::user()->id;
        $ticket->reference_id = 2;
        $ticket->save();
        dd($ticket);
    }
}
