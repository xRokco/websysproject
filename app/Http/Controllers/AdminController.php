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

class AdminController extends Controller
{    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gets all the event details from the event database table
        $events = events::all();
        $messages = Message::orderBy('created_at', 'desc')->get();
        $readMessages = Message::withTrashed()->whereNotNull('deleted_at')->orderBy('created_at', 'desc')->get();

        //Returns the events view along with the $events array containing the query results from above
        return view('admin/admin', ['events' => $events, 'messages' => $messages, 'readMessages' => $readMessages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/create'); //returns create view if both are true
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $input)
    {
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

        events::create($input->all()); //creates a new event with these details

        $name = events::latest()->first()->id . "." . Input::file('image')->getClientOriginalExtension(); //gets the event ID and concat on the imaage file extension that was uploaded 
        Input::file('image')->move(__DIR__.'/../../../public/img/event_images',$name); //moves the uploaded image from the tmp directory to a premanant one (/public/img/event_images) and renames it to <eventID>.<fileExt>
        
        $image = events::latest()->first();//returns the latest event added to the table (the one just added above)
        $image->image = $name; //adds the image name from above to the image column of the latest event
        $image->save(); //saves the above action

        return redirect('events'); //redirects to events view when finished
    }

    public function getAttendees($id)
    {
        return view('admin/attendees')->with('atnd', $id);
    }

    public function printAttendees($id)
    {
        return view('admin/printall')->with('atnd', $id);
    }

    //Called when delete is clicked on the admin page
    //Checks the user is an admin and deletes the selected event
    public function deleteEvent($id)  
    {
        events::destroy($id);
        Rsvp::where('eventid',$id)->delete();
        return redirect('/admin');
    }

    public function editEventInfo($id)
    {
        $event = events::select('events.*')->where('id', '=', $id)->first();
        return view('admin/edit',['event' => $event]);
    }

    /**
     * Update the specified resource in storage.
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
            events::where('id', $id)->update(['name'=>$name, 'venue'=>$venue, 'city'=>$city, 'price'=>$price, 'information'=>$information, 'description'=>$description, 'capacity'=>$capacity, 'date'=>$date, 'image'=>$image]);
            $imgName = $id . "." . Input::file('image')->getClientOriginalExtension(); //gets the event ID and concat on the imaage file extension that was uploaded 
            Input::file('image')->move(__DIR__.'/../../../public/img/event_images',$imgName); //moves the uploaded image from the tmp directory to a premanant one (/public/img/event_images) and renames it to <eventID>.<fileExt>
            
            $image = events::where('id', $id)->first();//returns the same event as the one being updated
            $image->image = $imgName; //adds the image name from above to the image column of the latest event
            $image->save(); //saves the above action
        }else{
            events::where('id', $id)->update(['name'=>$name, 'venue'=>$venue, 'city'=>$city, 'price'=>$price, 'information'=>$information, 'description'=>$description, 'capacity'=>$capacity, 'date'=>$date]);
        }

        return redirect('admin');
    }

    public function showInbox()
    {
        $messages = Message::all();
        $readMessages = Message::withTrashed()->whereNotNull('deleted_at')->get();

        return view('admin/inbox', ['messages' => $messages, 'readMessages' => $readMessages]);
    }

    public function markAsRead($id)
    {
        Message::where('id', $id)->delete();

        return redirect('/admin#inbox');
    }
}