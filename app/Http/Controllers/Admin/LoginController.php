<?php
namespace App\Http\Controllers\Admin; //admin add

use App\Http\Controllers\Controller; // using controller class

class LoginController extends Controller {
  public function index() {
    return \View::make('admin.login');
  }
}

?>