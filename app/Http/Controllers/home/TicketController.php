<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
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
}
