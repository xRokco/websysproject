<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;

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


public function update($id) 
    {
        $name = $request->input('name');
        $surname = $request->input('surname');
        $email = $request->input('email');
        $direction = $request->input('direction');

        User::where('id', \Auth::user()->id)->update(['name'=>$name, 'surname'=>$surname, 'email'=>$email, 'direction'=>$direction]);

        return redirect('dash');
    }

}
