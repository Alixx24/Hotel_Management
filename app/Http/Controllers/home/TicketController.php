<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\Home\Ticket;
use App\Repositories\TicketInterface;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    private TicketInterface $repo;
    public function __construct(TicketInterface $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
       $fetchTicketCats = $this->repo->index();
        return view('home.ticket.index', compact('fetchTicketCats'));
    }
    public function create()
    {
       $fetchTicketCats = $this->repo->create();
        return view('home.ticket.create', compact('fetchTicketCats'));
    }

    public function store(Request $request, Ticket $ticket)
    {
        $data = $request->all();
        $this->repo->storeTicket($ticket,$data);
        return redirect()->back('success', 'Ticket Was Send Successfully!');
    }
}
