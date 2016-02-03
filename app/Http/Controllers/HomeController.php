<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\events;

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

        //Returns the events view along with the $events array containing the query results from above
        return view('admin/admin', ['events' => $events]);
    }

    public function editUserInfo() 
    {

        $user = \DB::table('users')->select('users.*')->where('id', '=', \Auth::user()->id)->first();
        return view('account',['user' => $user]);
    }


    public function update(Request $request) 
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $direction = $request->input('direction');

        User::where('id', \Auth::user()->id)->update(['name'=>$name, 'surname'=>$surname, 'email'=>$email, 'direction'=>$direction]);

        return redirect('dash');
    }

     public function deleteEvent($id)  
    {
        if(\Auth::user()->admin==1){
                events::destroy($id);
                Rsvp::where('eventid',$id)->delete();
            }
            return redirect('admin/admin');
    } 

}
