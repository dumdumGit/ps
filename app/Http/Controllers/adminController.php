<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
}
