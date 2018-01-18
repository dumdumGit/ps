<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\pengguna;
use App\User;
use Datatables;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Input;
use Storage;

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
    return view('dashboard.pengguna.pengguna', ['usernya'=>$usernya]);
  }

  public function posregisnya()
  {
    $user = DB::table('users')->get();
    foreach ($user as $usernya) {
      if (Input::get('email') == $usernya->email) {
        return redirect('/pengguna')->withErrors(['Email sudah digunakan']);
      }
    }
    $rolesnya = DB::table('roles')->select('id')->where('namaRule', '=', 'user')->first()->id;
    $user = new User();
    $user->email = strip_tags(Input::get('email'));
    $user->name = strip_tags(Input::get('nama'));
    $user->password = bcrypt(Input::get('password'));
    $user->roles_id = $rolesnya;

    $user->save();
    return redirect('/pengguna');
  }

  //ini buat view dimana kita bakalan nge set value ke form
    public function edit($id)
    {
      $user = user::find($id);
      if(!$user)
      abort(404);

      return view('dashboard.pengguna.edit-pengguna', ['user'=>$user]);
    }

  //ini buat setelah di klik post/put buat update data nya
    public function update(Request $request, $id)
    {
      $user = user::find($id);
      $user->name = strip_tags($request->nama);
      $user->email = strip_tags($request->email);
      $user->roles_id = $request->roles;
      $user->save();
      return redirect('pengguna');
    }

  //konsep sama....
    public function delete($id)
    {
      $user = user::find($id);
      if(!$user)
      abort(404);

      return view('dashboard.pengguna.delete-pengguna', ['user'=>$user]);
    }

    public function destroy($id)
    {
      $user = user::find($id);
      $user->delete();
      return redirect('pengguna');
    }



}
