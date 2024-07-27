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
        $this->repo->index();
    }

    public function create()
    {

    }
}
