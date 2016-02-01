<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\events;
use Illuminate\Support\Facades\Input;

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
       $user = \DB::table('users')->select('users.*')->where('id', '=', $id)->first();

   $upFirstName = Input::get('name');
   $upSurname = Input::get('surname');
   $upEmail = Input::get('email');
   $upDirection = Input::get('direction');
   $id = $user->id;

//$user->name = $upFirstName;
//$user->surname = $upSurname;
//$user->email = $upEmail;
//$user->direction = $upDirection;
//$user->save();


   //$sql = "UPDATE users SET name = '$upFirstName' surname = '$upSurname' email = '$upEmail' direction = '$upDirection' WHERE id = '$id'";
   //\DB::statement($sql);
\DB::table('users')
            ->where('id', $id)
            ->update(['name' => $upFirstName, 'surname' => $upSurname, 'email' => $upEmail, 'direction' => $upDirection]);
        return redirect('dash');
    }

}
