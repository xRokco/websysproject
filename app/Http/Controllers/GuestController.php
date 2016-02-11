<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Event;
use App\Rsvp;
use Illuminate\Support\Facades\Input;
use App\Message;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GuestController extends Controller
{
    /**
     * Display a listing of the resource.
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

    public function contactUs(Request $input)
    {
        $this->validate($input, [
        'name' => 'required|max:60',
        'subject' => 'required|max:30',
        'email' => 'required|max:30',
        'message' => 'required',
        ]);

        $date = Carbon::now();

        Message::create($input->all()); //creates a new event with these details

        Message::latest()->first()->update(['date' => $date]);

        return redirect('/'); //redirects to events view when finished
    }

    public function welcome()
    {
        $randEvent=Event::orderBy(DB::raw('RAND()'))->get();
        return view('welcome', ['randEvent' => $randEvent]);
    }
}
