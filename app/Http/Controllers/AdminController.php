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

        $validation = Validator::make($data ,[
            'title' => 'string',
            'price' => 'number',
            'description' => 'string',
            'image' => 'image', 'mimes:jpeg,png,jpg,gif,svg'
        ]);

        $data = $this->repo->add_room($data);

        return redirect()->back()->with('message', 'Room Created Succefully!');
    }

    public function view_room()
    {
        $fetchRooms = $this->repo->view_room();
        return view('admin.view_room', compact('fetchRooms'));
    }

    public function delete_room($id)
    {
        $fetchRoom = Room::find($id);
        $fetchRoom->delete();
        return redirect()->back();
    }

    public function update_room($id)
    {
        $fetchRoom = Room::find($id);

        return view('admin.update_room', compact('fetchRoom'));
    }

    public function edit_room(Request $request, $id)
    {
        $data = Room::find($id);
        $data->room_title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->wifi = $request->wifi;
        $data->room_type = $request->room_type;


        $image = $request->image;
        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('room', $imagename);
            $data->image = $imagename;
        }
        $data->save();

        return redirect()->back();
    }
}
