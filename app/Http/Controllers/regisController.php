<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\role;
use DB;
use Illuminate\Support\Facades\Input;

class regisController extends Controller
{
  public function __construct()
  {
      $this->middleware('guest');
  }

  public function getRegis()
  {
    return view('FormRegister');
  }

  public function postRegis()
  {
    $rolesnya = DB::table('roles')->select('id')->where('namaRule', '=', 'User')->first()->id;
    $user = new User();
    $user->email = Input::get('email');
    $user->name = Input::get('nama');
    $user->password = bcrypt(Input::get('password'));
    $user->roles_id = $rolesnya;

    $user->save();
    return redirect('/');
  }
}
