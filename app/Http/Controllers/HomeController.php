<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\events;
use App\Message;
use App\Rsvp;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;

class HomeController extends Controller
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

    public function getEventDetails($id)
    {
        if (\Auth::check()) { //checks if user is logged in
            $ev = events::where('id', $id)->first();
            $rsvp = \DB::table('events')
                    ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
                    ->join('users', 'users.id', '=', 'rsvp.userid')
                    ->select('events.*')
                    ->where(['userid' => \Auth::user()->id, 'eventid' => $id])
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
        } else {    
            return redirect()->route('login'); //otherwise redirects to the login page
        }
    }

    public function printEventTicket($id)
    {
        return view('print')->with('event', $id); //returns event ticket print page for the corresponding ID
    }

    public function showUserEvents()
    {
        // Displays all events that the user is attending

        $rsvp = \DB::table('events')
            ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('events.*')
            ->where('rsvp.userid', '=', \Auth::user()->id)
            ->distinct()
            ->get();

        return view('dash', ['rsvp' => $rsvp]); //returns dash view with $rsvp array with query results from above
    }

    // Attend an event function
    // Database insertion links user to event
    public function attendEvent($id) 
    {
        $count = Rsvp::where('eventid', $id)->count();
        $ev = events::where('id', $id)->first();
        if($count < $ev->capacity)
        {
            do {
                $code = str_random(10);
            } while (Rsvp::where("code", $code)->where('eventid', $id)->first() instanceof Rsvp);
            
            Rsvp::insert(['userid' => \Auth::user()->id, 'eventid' => $id, 'code' => $code]);
            
            return redirect('dash'); 
        } else {
            echo "Event full";
        }     
    }

    //Unattend an event function 
    //Database deletion removes link between user and event
    public function unattendEvent($id) 
    {
        Rsvp::where(['userid' => \Auth::user()->id, 'eventid' => $id])->delete();
        return redirect('/events');
    }

    //Called when the user clicks edit on the dash
    //Returns the auth users details and then returns the account view
    public function editUserInfo() 
    {

        $user = User::select('users.*')->where('id', '=', \Auth::user()->id)->first();
        return view('account',['user' => $user]);
    }

    //Called when update is clicked on the account page
    //Adds the new values to the users DB while validating the input
    //Returns redirect to dash view
    public function updateUser(Request $request) 
    {
        $id = \Auth::user()->id;

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
