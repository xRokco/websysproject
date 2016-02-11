<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Message;
use App\Rsvp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the event detail page
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function getEventDetails($id)
    {
        $ev = Event::where('id', $id)->first();
        $rsvp = DB::table('events')
                ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
                ->join('users', 'users.id', '=', 'rsvp.userid')
                ->select('events.*')
                ->where(['userid' => Auth::user()->id, 'eventid' => $id])
                ->distinct()
                ->get();

        $full = FALSE;

        $count = Rsvp::where('eventid', $id)->count();
        if($count >= $ev->capacity)
        {
            $full = TRUE;
        }
        $stripe =[
            'publishable' => 'pk_test_qqbGUEke0JuODLnXOpEHbF7z',
            'private' => 'sk_test_B0nWhDWzkxkF3oX6ZL9rZIEy'
        ];
        return view('details', ['ev' => $ev, 'rsvp' => $rsvp, 'full' => $full, 'stripe' => $stripe]); //returns event details page for the corresponding ID
    }

    /**
     * Show the print tickeyt page
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function printEventTicket($id)
    {
        $ev = Event::where('id', $id)->first();
        
        $rsvp = Event::join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('rsvp.code')
            ->where(['userid' => Auth::user()->id, 'eventid' => $id])
            ->distinct()
            ->first();

        return view('print', ['ev' => $ev, 'rsvp' => $rsvp]); //returns event ticket print page for the corresponding ID
    }

    /**
     * Show the user dashboard.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showUserEvents()
    {
        // Displays all events that the user is attending

        $rsvp = DB::table('events')
            ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('events.*')
            ->where('rsvp.userid', '=', Auth::user()->id)
            ->distinct()
            ->get();

        return view('dash', ['rsvp' => $rsvp]); //returns dash view with $rsvp array with query results from above
    }

    /**
     * Store an new row in the rsvp table corresponding to the usersid and the eventid.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function attendEvent($id) 
    {
        $count = Rsvp::where('eventid', $id)->count();
        $ev = Event::where('id', $id)->first();
        if($count < $ev->capacity)
        {
            do {
                $code = str_random(10);
            } while (Rsvp::where("code", $code)->where('eventid', $id)->first() instanceof Rsvp);
            
            Rsvp::insert(['userid' => Auth::user()->id, 'eventid' => $id, 'code' => $code]);
            
            return redirect('dash'); 
        } else {
            echo "Event full";
        }     
    }

    /**
     * Delete a row from the rsvp table corresponding to the event id and the user id.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function unattendEvent($id) 
    {
        Rsvp::where(['userid' => Auth::user()->id, 'eventid' => $id])->delete();
        return redirect('/events');
    }

    /**
     * Show the page that lets a user edit their personal details.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUserInfo() 
    {

        $user = User::select('users.*')->where('id', '=', Auth::user()->id)->first();
        return view('account',['user' => $user]);
    }

    /**
     * Updates the user's info in the users table
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request) 
    {
        $id = Auth::user()->id;

        $this->validate($request, [
        'name' => 'required|max:30',
        'surname' => 'required|max:30',
        'email' => 'required|max:30|unique:users,email,'.$id,
        'direction' => 'required|max:255',
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $direction = $request->input('direction');

        User::where('id', $id)->update(['name'=>$name, 'surname'=>$surname, 'email'=>$email, 'direction'=>$direction]);

        return redirect('dash');
    }
}
