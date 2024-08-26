<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Comment;
use App\Models\Room;
use App\Models\User;
use App\Repositories\HomeInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    private HomeInterface $repo;
    public function __construct(HomeInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        $fetchHotel = $this->repo->index();
        return view('home.index', compact('fetchHotel'));
    }
    public function room_details($id)
    {
        $fetchRoom = $this->repo->room_details($id);
        $fetchViolations = $this->repo->fetchViolation();
        return view('home.room_details', compact('fetchRoom', 'fetchViolations'));
    }

    public function add_booking(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date',
        ]);
        $data = $this->repo->add_booking($data, $id);

        return redirect()->back()->with('message', 'room is added!');
    }

    public function hotel_details($id)
    {
        $fetchHotel = $this->repo->hotel_details($id);
        $fetchViolations = $this->repo->fetchViolation();
        return view('home.hotel_details', compact('fetchHotel', 'fetchViolations'));
    }

    public function violation($fetchRoom, $violation)
    {
        $this->repo->violation($fetchRoom, $violation);
        return redirect()->back()->with('message', 'The Report Was Sent Successfully');
    }

    public function commentStore(Comment $comment, Request $request, $id)
    {
        $data = $request->all();

        // $validator = Validator::make($data, [
        //     'commentBody' => 'required',
        // ]);


        $comment->body = $data['commentBody'];
        $comment->author_id = Auth::user()->id;
        $comment->owner_post_id = $id;
        $comment->seen = 0;
        $comment->approved = 0;
        $comment->status = 0;


        $comment->save();
        return redirect()->back()->with('message', 'Commetnt Sent Successfully');
    }

    public function commentGuestStore(Comment $comment, User $user, Request $request, $id)
    {
        $data = $request->all();

        // $validator = Validator::make($data, [
        //     'commentBody' => 'required',
        // ]);
        $nameOfGuest = explode('@', $data['guestEmail']);
        $user->email = $data['guestEmail'];
        $user->name = $nameOfGuest[0];
        $user->password = 'password';
        $user->userType = 'guest';
        $user->save();


        $authorIdFind = User::where('email', $data['guestEmail'])->get();

        $comment->body = $data['guestCommentBody'];
        $comment->author_id =  $authorIdFind[0]->id;
        $comment->owner_post_id = $id;
        $comment->seen = 0;
        $comment->approved = 0;
        $comment->status = 0;
        $comment->save();
    }
}
