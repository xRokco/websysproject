<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\events;
use App\Rsvp;
use Illuminate\Support\Facades\Input;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Gets all the event details from the event database table
        $events = events::all();

        //Returns the events view along with the $events array containing the query results from above
        return view('events', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::check()){ //Checks if the user is logged in
            if(\Auth::user()->admin==1){ //checks that the logged in user is an admin
                return view('admin/create'); //returns create view if both are true
            }else{
                return redirect('events'); //otherwise redirects to events view
            }
        }else{
            return redirect('events');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $input = Request::all(); //takes all the details from the create event form when submitted

        events::create($input); //creates a new event with these details

        $name = events::latest()->first()->id . "." . Input::file('image')->getClientOriginalExtension(); //gets the event ID and concat on the imaage file extension that was uploaded 
        Input::file('image')->move(__DIR__.'/../../../public/img/event_images',$name); //moves the uploaded image from the tmp directory to a premanant one (/public/img/event_images) and renames it to <eventID>.<fileExt>
        
        $image = events::latest()->first();//returns the latest event added to the table (the one just added above)
        $image->image = $name; //adds the image name from above to the image column of the latest event
        $image->save(); //saves the above action

        return redirect('events'); //redirects to events view when finished
    }

    public function getEventDetails($id)
    {
        if (\Auth::check()) { //checks if user is logged in
            return view('details')->with('event', $id); //returns event details page for the corresponding ID
        } else {    
            return redirect()->route('login'); //otherwise redirects to the login page
        }
    }

    public function printEventTicket($id)
    {
        if (\Auth::check()) { //checks if user is logged in
            return view('print')->with('event', $id); //returns event ticket print page for the corresponding ID
        } else {
            return redirect()->route('login'); //otherwise redirects to the login page
        }
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
        \DB::table('rsvp')->insert(
        ['userid' => \Auth::user()->id, 'eventid' => $id]);
        return redirect('dash');     
        }
    //Unattend an event function 
    //Database deletion removes link between user and event
    public function unattendEvent($id) 
    {
        \DB::table('rsvp')->where(
                ['userid' => \Auth::user()->id, 'eventid' => $id])->delete();
                return redirect('dash');     
    }


    public function deleteEvent($id)  
    {
        if(\Auth::user()->admin==1){
                events::destroy($id);
                Rsvp::where('eventid',$id)->delete();
            }
            return redirect('admin');
    } 
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function editEventInfo($id)
        {
             $event = \DB::table('events')->select('events.*')->where('id', '=', $id)->first();
        return view('admin/edit',['event' => $event]);
        }

        /**
         * Update the specified resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, $id)
        {

        $name = $request->input('name');
        $venue = $request->input('venue');
        $city = $request->input('city');
        $price = $request->input('price');
        $information = $request->input('information');
        $capacity = $request->input('capacity');
        $date = $request->input('date');
        $image = $request->input('image');

        events::where('id', $id)->update(['name'=>$name, 'venue'=>$venue, 'city'=>$city, 'price'=>$price, 'information'=>$information, 'capacity'=>$capacity, 'date'=>$date, 'image'=>$image]);

        $imgName = events::latest()->first()->id . "." . Input::file('image')->getClientOriginalExtension(); //gets the event ID and concat on the imaage file extension that was uploaded 
        Input::file('image')->move(__DIR__.'/../../../public/img/event_images',$imgName); //moves the uploaded image from the tmp directory to a premanant one (/public/img/event_images) and renames it to <eventID>.<fileExt>
        
        $image = events::latest()->first();//returns the latest event added to the table (the one just added above)
        $image->image = $imgName; //adds the image name from above to the image column of the latest event
        $image->save(); //saves the above action



        return redirect('admin');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id)
        {
            
        }
    }
