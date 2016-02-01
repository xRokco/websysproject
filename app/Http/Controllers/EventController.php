<?php

namespace App\Http\Controllers;

use Request;

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
        //
        $events = events::all();

        return view('events', ['events' => $events]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::check()){
            if(\Auth::user()->admin==1){
                return view('create');
            }else{
                return redirect()->route('events');
            }
        }else{
            return redirect()->route('events');
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
        $input = Request::all();

        events::create($input);

        $name = events::latest()->first()->id . "." . Input::file('image')->getClientOriginalExtension(); 
        Input::file('image')->move(__DIR__.'/../../../public/img/event_images',$name);
        
        $image = events::latest()->first();
        $image->image = $name;
        $image->save();

        return redirect('events');    
    }

    public function getEventDetails($id)
    {
         if (\Auth::check()) {
                return view('details')->with('event', $id);
            } else {    
                return redirect()->route('login');
            }
    }

    public function printEventTicket($id)
    {
         if (\Auth::check()) {
                return view('print')->with('event', $id);
            } else {
                return redirect()->route('login');
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

            return view('dash', ['rsvp' => $rsvp]);
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
            return redirect('events');
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
        public function edit($id)
        {
            //
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
            //
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
