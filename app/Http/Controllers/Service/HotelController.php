<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Repositories\HotelInterface;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    private HotelInterface $repo;
    public function __construct(HotelInterface $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
       $fetchHotels = $this->repo->index();
       return view('home.hotel.index', compact('fetchHotels'));
    }

    public function create()
    {

    }

    public function agentRegister()
    {
        return view('home.hotel.agent.register');
    }
    public function agentRegisterStore(Request $request)
    {
        $data = $request->all();
        $fetchHotels = $this->repo->agentRegisterStore($data);
        return redirect()->back()->with('message', 'Register successfully');
    }
}
