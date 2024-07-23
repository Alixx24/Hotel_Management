<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Repositories\AdminInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    private AdminInterface $repo;
    public function __construct(AdminInterface $repo)
    {
        $this->repo = $repo;
    }
    public function index()
    {
        if (Auth::id()) {

            $userType = Auth::user()->usertype;

            if ($userType == 'user') {
                return view('home.index');
            } else if ($userType == 'admin') {
                return view('admin.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function home()
    {
        $fetchRoom = $this->repo->home();
        return view('home.index', compact('fetchRoom'));
    }

    public function create_room()
    {
        return view('admin.create_room');
    }

    public function add_room(Request $request)
    {
        $data = $request->all();

        $validation = Validator::make($data, [
            'title' => 'string',
            'price' => 'number',
            'description' => 'string',
            'image' => 'image', 'mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = $this->repo->add_room($data);

        return redirect()->back()->with('message', 'Room Created Successfully!');
    }

    public function view_room()
    {
        $fetchRooms = $this->repo->view_room();
        return view('admin.view_room', compact('fetchRooms'));
    }

    public function delete_room($id)
    {
        $fetchRoom = $this->repo->delete_room($id);
        return redirect()->back();
    }

    public function update_room($id)
    {
        $fetchRoom = $this->repo->update_room($id);
        return view('admin.update_room', compact('fetchRoom'));
    }

    public function edit_room(Request $request, $id)
    {
        $data = $request->all();
        $fetchRoom = $this->repo->edit_room($data,$id);
        return redirect()->back()->with('message', 'Room Updated Successfully');
    }
}
