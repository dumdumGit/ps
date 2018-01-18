<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Datatables;
Use DB;

class getController extends Controller
{
  public function dataPengguna() {
    $users = User::select(['id', 'name', 'email', 'password', 'roles_id'])->get();

    return Datatables::of($users)
        ->addColumn('roles', function($user) {
          $rolesnya = DB::table('roles')->where('id','=',$user->roles_id)->first()->namaRule;
          return $rolesnya;
        })
        ->addColumn('action', function ($user) {
            return
            '<a style="margin-left:5px" href="/pengguna/'.$user->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</a>'.
            '<a style="margin-left:5px" href="/pengguna/'.$user->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
        })
        ->removeColumn('password')
        ->make(true);
  }
}
