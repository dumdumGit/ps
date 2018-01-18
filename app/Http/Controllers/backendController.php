<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class backendController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }

  public function logout() {
    Auth::logout();
    return redirect('/')->with('status', 'Anda Telah berhasil logout!');
  }
}
