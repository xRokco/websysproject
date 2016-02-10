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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(\Auth::user()->admin==1){ //checks that the logged in user is an admin
            return view('admin/create'); //returns create view if both are true
        }else{
            return redirect('events'); //otherwise redirects to events view
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $input)
    {
        //$input = \Request::all(); takes all the details from the create event form when submitted

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

    public function getAttendees($id)
    {
        if(\Auth::user()->admin==1){ //checks that the logged in user is an admin
            return view('admin/attendees')->with('atnd', $id);
        } else {
            return redirect('events'); //otherwise redirects to the login page
        }
    }

    public function printAttendees($id)
    {
        if(\Auth::user()->admin==1){ //checks that the logged in user is an admin
            return view('admin/printall')->with('atnd', $id);
        }else{
            return redirect('events'); //otherwise redirects to the login page
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

    //Called when delete is clicked on the admin page
    //Checks the user is an admin and deletes the selected event
     public function deleteEvent($id)  
    {
        if(\Auth::user()->admin==1){
            events::destroy($id);
            Rsvp::where('eventid',$id)->delete();
        }
        return redirect('/admin');
    }

    public function editEventInfo($id)
    {
        if(\Auth::user()->admin==1){
            $event = events::select('events.*')->where('id', '=', $id)->first();
            return view('admin/edit',['event' => $event]);
        }else{
            return redirect('events');
        }
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
        if(\Auth::user()->admin==1){
            return view('admin/admin', ['events' => $events, 'messages' => $messages, 'readMessages' => $readMessages]);
        }else{
            return redirect('events');
        }
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

    

    public function showInbox()
    {
        if(\Auth::user()->admin==1){
            $messages = Message::all();
            $readMessages = Message::withTrashed()->whereNotNull('deleted_at')->get();

            return view('admin/inbox', ['messages' => $messages, 'readMessages' => $readMessages]);
        } else {
            return redirect('events');
        }
    }

    public function markAsRead($id)
    {
        Message::where('id', $id)->delete();

        return redirect('/admin#inbox');
    }
}
