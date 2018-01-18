<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\pengguna;
use App\User;
use Datatables;

class adminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rule:Admin');
  }

  public function getDashboard() {
    return view("dashboard.index");
  }

  public function getPengguna() {
    $usernya = DB::table('users')->get();
    return view('dashboard.pengguna', ['usernya'=>$usernya]);
  }
}
