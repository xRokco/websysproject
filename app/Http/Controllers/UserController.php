<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Message;
use App\Rsvp;
use App\Admin;
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
        //applies the auth middleware to all functions in this class.
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
        //Returns the event details for event with id $id
        $ev = Event::where('id', $id)->first();

        //Checks if the current user has an entry in the rsvp table for the current event
        $rsvp = DB::table('events')
                ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
                ->join('users', 'users.id', '=', 'rsvp.userid')
                ->select('events.*')
                ->where(['userid' => Auth::user()->id, 'eventid' => $id])
                ->distinct()
                ->get();

        //sets default value of full
        $full = FALSE;

        //checks how many entries in the rsvp table there are for the given event, counts them
        $count = Rsvp::where('eventid', $id)->count();
        
        //tests the value of above with the event capacity.
        if($count >= $ev->capacity)
        {
            $full = TRUE;//sets $full to true if the check passes.
        }

        //Stripes keys
        $stripe =[
            'publishable' => env('STRIPE_PUB'),
            'private' => env('STRIPE_PRI')
        ];

        //returns event details page for the corresponding ID, with event details ($ev),
        //rsvp details ($rsvp), capacity details ($full) and stripe details ($stripe) passed in.
        return view('details', ['ev' => $ev, 'rsvp' => $rsvp, 'full' => $full, 'stripe' => $stripe]);
    }

    /**
     * Show the print tickeyt page
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function printEventTicket($id)
    {
        //Returns the event details for event with id $id
        $ev = Event::where('id', $id)->first();
        
        //checks that the current user is attending the current event
        $rsvp = Event::join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('rsvp.code')
            ->where(['userid' => Auth::user()->id, 'eventid' => $id])
            ->distinct()
            ->first();

        //returns event ticket print page with event details ($ev) and rsvp details ($rsvp)
        //passed in
        return view('print', ['ev' => $ev, 'rsvp' => $rsvp]);
    }

    /**
     * Show the user dashboard.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function showUserEvents()
    {
        //Returns all events that the user is attending
        $rsvp = DB::table('events')
            ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('events.*')
            ->where('rsvp.userid', '=', Auth::user()->id)
            ->distinct()
            ->get();

        //returns dash view with $rsvp array with query results from above
        return view('dash', ['rsvp' => $rsvp]);
    }

    /**
     * Add a row to the rsvp table corresponding to the event id and the user id.
     * Called from a post from the Stripe payment javascript.
     *
     * @param  \Illuminate\Http\Request  $req
     * @return \Illuminate\Http\Response
     */
    public function attendEvent(Request $req) 
    {
        $evid = $req->input('evid');
        $count = Rsvp::where('eventid', $evid)->count();
        $ev = Event::where('id', $evid)->first();

        if($count < $ev->capacity)
        {
            do {
                $code = str_random(10);
            } while (Rsvp::where("code", $code)->where('eventid', $evid)->first() instanceof Rsvp);
            
            Rsvp::insert(['userid' => Auth::user()->id, 'eventid' => $evid, 'code' => $code]);

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
        //deletes the row corresponding to the current user and the eventid $id from
        //the rsvp table
        Rsvp::where(['userid' => Auth::user()->id, 'eventid' => $id])->delete();
        
        //redirects to the events page.
        return redirect('/events');
    }

    /**
     * Show the page that lets a user edit their personal details.
     *
     * @return \Illuminate\Http\Response
     */
    public function editUserInfo() 
    {
        //gets the current user's info.
        $user = User::select('users.*')->where('id', '=', Auth::user()->id)->first();
        
        //returs the account page with the users details passed through.
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
        //Sets the id of the current user to $id.
        $id = Auth::user()->id;

        //validates the input of the editUserInfo form
        $this->validate($request, [
        'name' => 'required|max:15',
        'surname' => 'required|max:15',
        'email' => 'required|max:30|unique:users,email,'.$id,//makes sure the email entered is unique in the users table, but excludes the current user from the check, so that if the current user doesn't want to change his email it doesn't give an error.
        'direction' => 'required|max:255',
        ]);

        //Assigns each value from the form to a variable.
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $direction = $request->input('direction');

        //Updates the users table with the data from the form.
        User::where('id', $id)->update(['name'=>$name, 'surname'=>$surname, 'email'=>$email, 'direction'=>$direction]);

        //redirects to the dash page.
        return redirect('/dash');
    }
}
