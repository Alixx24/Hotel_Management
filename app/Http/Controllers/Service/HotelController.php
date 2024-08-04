<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Repositories\HotelInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function agentRegister()
    {
        return view('home.hotel.agent.register');
    }

    public function agentDashboard()
    {
        $agentInfo = $this->repo->findAgent();
        return view('home.hotel.agent.dashboard', compact('agentInfo'));
    }

    public function agentRegisterStore(Request $request)
    {
        $data = $request->all();
        $fetchHotels = $this->repo->agentRegisterStore($data);
        return redirect()->back()->with('message', 'Register successfully');
    }

    public function login()
    {
        return view('home.hotel.agent.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $agent = $this->repo->checkLoginAgent($credentials);
        if ($agent) {
            return redirect()->intended('/agent/dashboard/' . $this->repo->authGuard());
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function edit($id)
    {
        $fetchHotel = $this->repo->edit($id);
        return view('home.hotel.agent.edit', compact('fetchHotel'));
    }

    public function update(Request $request,$id)
    {
        dd('dsssss');
    }
}
