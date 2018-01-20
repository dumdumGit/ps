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

  public function getIndex() {
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view("index", ['pengaturan'=>$pengaturan]);
  }

  public function getProfil() {
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view("profil", ['pengaturan'=>$pengaturan]);
  }
}
