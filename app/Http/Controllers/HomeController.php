<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Request;
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
        return view('dash');
    }

public function editUserInfo() 
    {

       $user = \DB::table('users')->select('users.*')->where('id', '=', \Auth::user()->id)->first();
        return view('account',['user' => $user]);
    }


public function update(Request $request) 
    {
       $model = \DB::table('users')->select('users.*')->where('id', '=', \Auth::user()->id);
       $user = $model->first();
        
      // $user = \DB::table('users')->select('users.*')->where('id', '=', \Auth::user()->id)->get();
        $user->update($request->all());

        return redirect('events');
    }

}
