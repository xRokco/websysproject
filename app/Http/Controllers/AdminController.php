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

class AdminController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //applies the admin middleware to all functions in this class.
        $this->middleware('admin');
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gets all the event details from the event table
        $events = Event::all();

        //gets all messages from the messages table
        $messages = Message::orderBy('created_at', 'desc')->get();

        //gets all the read (deleted) messages from the messags table.
        $readMessages = Message::withTrashed()->whereNotNull('deleted_at')->orderBy('created_at', 'desc')->get();

        //Returns the events view along with the $events, $messages and $readMessages arrays containing the query results from above
        return view('admin/admin', ['events' => $events, 'messages' => $messages, 'readMessages' => $readMessages]);
    }

    /**
     * Show the form for creating a new event.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns create view.
        return view('admin/create'); 
    }

    /**
     * Store a newly created event in the events table.
     *
     * @param  \Illuminate\Http\Request  $input
     * @return \Illuminate\Http\Response
     */
    public function store(Request $input)
    {
        //Validates the input from the create event page
        $this->validate($input, [
        'name' => 'required|max:40',
        'venue' => 'required|max:30',
        'city' => 'required|max:30',
        'price' => 'required|numeric',
        'information' => 'required|max:255',
        'description' => 'required',
        'capacity' => 'required|numeric',
        'date' => 'required|date',
        'image' => 'image|required',
        ]);

        //adds all the data from the create events page to the database in the events table
        Event::create($input->all());

        //gets the id of the event above and concats it to the file extension of the image uploaded.
        $name = Event::latest()->first()->id . "." . Input::file('image')->getClientOriginalExtension(); //gets the event ID and concat on the imaage file extension that was uploaded 
        
        //moves and renames the image selected from a temp directory to the event_images folder as 
        Input::file('image')->move(__DIR__.'/../../../public/img/event_images',$name); //moves the uploaded image from the tmp directory to a premanant one (/public/img/event_images) and renames it to <eventID>.<fileExt>
        
        $image = Event::latest()->first();//returns the latest event added to the table (the one just added above)
        $image->image = $name; //adds the image name from above to the image column of the latest event
        $image->save(); //saves the above action

        return redirect('events'); //redirects to events view when finished
    }

    /**
     * Show the page listing all the attendees for an event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAttendees($id)
    {
        $atns = DB::table('rsvp')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('*')
            ->where('rsvp.eventid', '=', $id)
            ->get();

        return view('admin/attendees', ['atns' => $atns, 'id' => $id]);
    }

    /**
     * Show the page listing all the tickets in printable format for an event.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function printAttendees($id)
    {
        $ev = Event::where('id', $id)->first();

        $atns = DB::table('rsvp')
            ->join('users', 'users.id', '=', 'rsvp.userid')
            ->select('*')
            ->where('rsvp.eventid', '=', $id)
            ->get();

        return view('admin/printall', ['atns' => $atns, 'ev' => $ev]);
    }

    /**
     * Delete an existing event from the events table.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function deleteEvent($id)  
    {
        Event::destroy($id);
        Rsvp::where('eventid',$id)->delete();
        return redirect('/admin');
    }

    /**
     * Show the form for editing an existing event's info.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editEventInfo($id)
    {
        $event = Event::select('events.*')->where('id', '=', $id)->first();
        return view('admin/edit',['event' => $event]);
    }

    /**
     * Update an existing event's info in the events table.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateEvent(Request $request, $id)
    {

        $this->validate($request, [
        'name' => 'required|max:40',
        'venue' => 'required|max:30',
        'city' => 'required|max:30',
        'price' => 'required|numeric',
        'information' => 'required|max:255',
        'description' => 'required',
        'capacity' => 'required|numeric',
        'date' => 'required|date',
        'image' => 'image',
        ]);

        $name = $request->input('name');
        $venue = $request->input('venue');
        $city = $request->input('city');
        $price = $request->input('price');
        $information = $request->input('information');
        $description = $request->input('description');
        $capacity = $request->input('capacity');
        $date = $request->input('date');
        $image = $request->input('image');

        
        if(Input::hasfile('image')){
            Event::where('id', $id)->update(['name'=>$name, 'venue'=>$venue, 'city'=>$city, 'price'=>$price, 'information'=>$information, 'description'=>$description, 'capacity'=>$capacity, 'date'=>$date, 'image'=>$image]);
            $imgName = $id . "." . Input::file('image')->getClientOriginalExtension(); //gets the event ID and concat on the imaage file extension that was uploaded 
            Input::file('image')->move(__DIR__.'/../../../public/img/event_images',$imgName); //moves the uploaded image from the tmp directory to a premanant one (/public/img/event_images) and renames it to <eventID>.<fileExt>
            
            $image = Event::where('id', $id)->first();//returns the same event as the one being updated
            $image->image = $imgName; //adds the image name from above to the image column of the latest event
            $image->save(); //saves the above action
        }else{
            Event::where('id', $id)->update(['name'=>$name, 'venue'=>$venue, 'city'=>$city, 'price'=>$price, 'information'=>$information, 'description'=>$description, 'capacity'=>$capacity, 'date'=>$date]);
        }

        return redirect('admin');
    }

    /**
     * Show the inbox page.
     *
     * @return \Illuminate\Http\Response
     */
    public function showInbox()
    {
        $messages = Message::all();
        $readMessages = Message::withTrashed()->whereNotNull('deleted_at')->get();

        return view('admin/inbox', ['messages' => $messages, 'readMessages' => $readMessages]);
    }

    /**
     * Deletes a message from the messages table.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function markAsRead($id)
    {
        Message::where('id', $id)->delete();

        return redirect('/admin#inbox');
    }

    /**
     * Show the page listing all the users.
     *
     * @return \Illuminate\Http\Response
     */
    public function manageAdmins()
    {
        $users = User::orderBy('admin', 'desc')->get();

        return view('admin/manage', ['users' => $users]);
    }

    /**
     * Updates the admin column of the user table to 1 for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function promote($id)
    {
        User::where('id', $id)->update(['admin' => 1]);

        return redirect('admin/manage');
    }

    /**
     * Updates the admin column of the user table to 0 for a given user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function demote($id)
    {
        User::where('id', $id)->update(['admin' => 0]);

        return redirect('admin/manage');
    }
}