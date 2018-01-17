<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class loginController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest');
  }

  public function getLogin()
  {
    return view('FormLogin');
  }

  public function postLogin(Request $request)
  {
    if (Auth::attempt ([
        'email' => $request->email,
        'password' => $request->password
      ]))
    {
      return redirect('dashboard');
    }
    else {
      return Redirect::back()->withErrors(['Password atau email anda salah!']);
    }
  }
}
