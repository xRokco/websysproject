<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\events;
use App\Message;

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

        $user = \DB::table('users')->select('users.*')->where('id', '=', \Auth::user()->id)->first();
        return view('account',['user' => $user]);
    }

    //Called when update is clicked on the account page
    //Adds the new values to the users DB while validating the input
    //Returns redirect to dash view
    public function update(Request $request) 
    {
        $this->validate($request, [
        'name' => 'required|max:30',
        'surname' => 'required|max:30',
        'email' => 'required|max:30|unique:users',
        'direction' => 'required|max:255',
        ]);

        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $direction = $request->input('direction');

        User::where('id', \Auth::user()->id)->update(['name'=>$name, 'surname'=>$surname, 'email'=>$email, 'direction'=>$direction]);

        return redirect('dash');
    }

    //Called when delete is clicked on the admin page
    //Checks the user is an admin and deletes the selected event
     public function deleteEvent($id)  
    {
        if(\Auth::user()->admin==1){
                events::destroy($id);
                Rsvp::where('eventid',$id)->delete();
            }
            return redirect('admin/admin');
    }

    public function showInbox()
    {
        $messages = Message::all();
        $readMessages = Message::withTrashed()->whereNotNull('deleted_at')->get();

        return view('admin/inbox', ['messages' => $messages, 'readMessages' => $readMessages]);
   
    }
}
