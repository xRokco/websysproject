<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Rsvp;
use App\User;
use Illuminate\Support\Facades\Input;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    /**
     * Shows the events page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gets all the event details from the event database table
        $events = Event::all();

        //Returns the events view along with the $events array containing the query results from above
        return view('events', ['events' => $events]);
    }

public function pastEvents()
    {
        //Gets all the event details from the event database table
        $events = Event::onlyTrashed()->get();

        //Returns the events view along with the $events array containing the query results from above
        return view('past', ['events' => $events]);
}
    /**
     * Adds a new message to the messages table.
     *
     * @param  \Illuminate\Http\Request  $input
     * @return \Illuminate\Http\Response
     */
    public function contactUs(Request $input)
    {
         //Sets the id of the current user to $id.
         $id = Auth::user()->id;
        //Validates the fields in the contactus form.
        $this->validate($input, [
        'subject' => 'required|max:40',
        'message' => 'required',
        ]);

        $subject = $input->input('subject');
        $message = $input->input('message');
        //gets current date
        $date = Carbon::now();

        //creates a new message with details the user inputs
        \DB::table('messages')->insert(['userid' => $id, 'subject' => $subject, 'message' => $message]);

        //Gets the latest message (the one added above) and fills the date column for it
        Message::latest()->first()->update(['date' => $date]);

        return redirect('/'); //redirects to homepage
    }

    /**
     * Shows the homepage.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        //Gets a list of all events in a random order.
        $randEvent=Event::orderBy(DB::raw('RAND()'))->get();

        //returns the welcome view with the array of events from above.
        return view('welcome', ['randEvent' => $randEvent]);
    }
}
