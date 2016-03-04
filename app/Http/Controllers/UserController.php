<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Event;
use App\Message;
use App\Rsvp;
use App\Admin;
use App\Video;
use App\Comment;
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
        $ev = Event::where('id', $id)->firstorfail();

        //Checks if the current user has an entry in the rsvp table for the current event
        $rsvp = DB::table('events')
                ->join('rsvp', 'events.id', '=', 'rsvp.eventid')
                ->join('users', 'users.id', '=', 'rsvp.userid')
                ->select('events.*')
                ->where(['userid' => Auth::user()->id, 'eventid' => $id])
                ->distinct()
                ->get();
        
        $comments = Comment::join('events', 'events.id', '=', 'comments.eventid')
            ->join('users', 'users.id', '=', 'comments.userid')
            ->select('comments.*', 'users.name')
            ->where('events.id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        //Checks if the current user is an admin
        $admin = DB::table('admins')
            ->join('users', 'users.id', '=', 'admins.userid')
            ->select('admins.*')
            ->where(['userid' => Auth::user()->id])
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
        return view('details', ['ev' => $ev, 'rsvp' => $rsvp, 'comments' => $comments, 'full' => $full, 'stripe' => $stripe, 'admin' => $admin]);
    }


    public function getPastEventDetails($id)
    {
        //Returns the past event details for event with id $id
       $ev = Event::where('id', $id)->onlyTrashed()->firstorfail();

        //Checks if the current event has any entries in the video table
        $videos = DB::table('videos')
            ->join('events', 'events.id', '=', 'videos.eventid')
            ->join('users', 'users.id', '=', 'videos.userid')
            ->select('videos.link','videos.title', 'users.*')
            ->where('events.id', '=', $id)
            ->get();
        
        //Checks if the current user is an admin
        $admin = DB::table('admins')
            ->join('users', 'users.id', '=', 'admins.userid')
            ->select('admins.*')
            ->where(['userid' => Auth::user()->id])
            ->distinct()
            ->get();
        
        //Checks if the current event has any entries in the comments table 
        $comments = DB::table('comments')
            ->join('events', 'events.id', '=', 'comments.eventid')
            ->join('users', 'users.id', '=', 'comments.userid')
            ->select('comments.*', 'users.name')
            ->where('events.id', '=', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        //Checks if the current user has an entry in the rsvp table for the past event
        $rsvp = DB::table('rsvp')->where('eventid', $id)->where('userid', Auth::user()->id)->get();
       
        //checks how many entries in the rsvp table there are for the given event, counts them
        $count = Rsvp::where('eventid', $id)->count();


        //returns event details page for the corresponding ID, with event details ($ev), event videos ($videos)
        return view('pastDetails', ['ev' => $ev, 'comments' => $comments, 'count' => $count, 'videos' => $videos, 'rsvp' => $rsvp, 'admin' => $admin]);
      
    }

    public function addVideo($ev)
    {
        //returns create view.
        $rsvp = DB::table('rsvp')->where('eventid', $ev)->where('userid', Auth::user()->id)->get();
        $admin = Admin::where('userid', Auth::user()->id)->get();
        // Checks if the user is either an admin and/or attended the past event
        //If true then the user can post videos
        //Else redirect them
        if($rsvp || $admin){
            if(Event::where('id', $ev)->onlyTrashed()->firstorfail()){
                return view('addVideo',['ev' => $ev]); 
            }
        }else {
            return redirect('past');
        }
    }

    public function storeVideo(Request $input, $id)
    {
        //Validates the input from the create event page
        $this->validate($input, [
        'title' => 'required|max:20',
        'link' => 'required|max:50|unique:videos',
        ]);

        //Assigns each value from the form to a variable.
        $title = $input->input('title');
        $link = $input->input('link');

        //Changes link to embed url
        if(strlen($link) > 11)
        {
            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $link, $match))
            {
                   $link = $match[1];
            }
            else
                return false;
        }

        //Updates the users table with the data from the form.
        Video::insert(['userid' => Auth::user()->id, 'eventid' => $id, 'title' => $title, 'link' => $link]);

        return redirect('past/pastDetails/' .$id.'#video'); //redirects to events view when finished
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
        $ev = Event::where('id', $id)->firstorfail();
        
        //checks that the current user is attending the current event
        $rsvp = Event::join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('rsvp.code')
            ->where(['userid' => Auth::user()->id, 'eventid' => $id])
            ->distinct()
            ->firstorfail();

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
        $rsvp = Event::join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('events.*')
            ->where('rsvp.userid', '=', Auth::user()->id)
            ->whereNull('events.deleted_at')
            ->distinct()
            ->get();

        //Returns all events that the user previously attended
        $pastrsvp = Event::join('rsvp', 'events.id', '=', 'rsvp.eventid')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('events.*')
            ->where('rsvp.userid', '=', Auth::user()->id)
            ->whereNotNull('events.deleted_at')
            ->onlyTrashed()
            ->distinct()
            ->get();

        //Checks if the user is an admin
        $admin = \DB::table('admins')
            ->join('users', 'users.id', '=', 'admins.userid')
            ->select('admins.*')
            ->where(['userid' => Auth::user()->id])
            ->distinct()
            ->get();

        //returns dash view with $rsvp array with query results from above
        return view('dash', ['rsvp' => $rsvp, 'admin' => $admin, 'pastrsvp' => $pastrsvp]);
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
       
        //requests the event id passed in form
        $evid = $req->input('evid');
        //Counts the users attending the event
        $count = Rsvp::where('eventid', $evid)->count();
        //Gets the details of the event
        $ev = Event::where('id', $evid)->first();
        //Checks the count isn't >= capacity
        if($count < $ev->capacity)
        {
            do {
                $code = str_random(10);
            } while (Rsvp::where("code", $code)->where('eventid', $evid)->first() instanceof Rsvp);
            // Inserts the user into the RSVP table for the current event
            Rsvp::insert(['userid' => Auth::user()->id, 'eventid' => $evid, 'code' => $code]);
            //Charges the user via Stripe for the current event
            \Stripe\Stripe::setApiKey(env('STRIPE_PRI'));
            $token = $req->input('stripeToken');
            $charge = \Stripe\Charge::create(array('source' => $token, 'amount' => $ev->price.'00', 'currency' => 'eur', 'description' => Auth::user()->email,"metadata" => array("Event" => $ev->name,"Customer Name" => Auth::user()->name.' '.Auth::user()->surname,"Address" => Auth::user()->direction ) ));
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
        $messages = [
            'regex' => 'The address must start with a letter or number.',
        ];

        $this->validate($request, [
        'name' => 'required|max:15',
        'surname' => 'required|max:15',
        'email' => 'required|max:30|unique:users,email,'.$id,//makes sure the email entered is unique in the users table, but excludes the current user from the check, so that if the current user doesn't want to change his email it doesn't give an error.
        'direction' => 'required|max:255|regex:/^[A-Za-z0-9][A-Za-z0-9]*/',
        ], $messages);

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

    public function storeComment(Request $req)
    {
        //Adds the details to the comment table and redirects
        $userid = Auth::id();
        $comment = $req->input('comment');
        $eventid = $req->input('ev');
        $date = Carbon::now();
        Comment::insert(['userid' => $userid, 'eventid' => $eventid, 'comment' => $comment, 'created_at' => $date]);
        
        if(Event::where('id', $eventid)->onlyTrashed()->first()){
            return redirect('/past/pastDetails/'.$eventid.'#comments');
        }else{
            return redirect ('/events/details/'.$eventid.'#comments');
        }
    }
}

 