<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\pengaturan;
use Datatables;
Use DB;
use App\berita;

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


  public function getBeritaSingle($slug) {
    $berita = DB::table('berita')->get();
    $beritanya = DB::table('berita')->where('sluglink','=',$slug)->first();
    if(!$beritanya)
    abort(404);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('BeritaSingle', ['beritanya'=>$beritanya,'pengaturan'=>$pengaturan]);
  }

  public function getPageBerita() {
    $berita = DB::table('berita')->where('jenis','=','berita_umum')->orderBy('updated_at', 'desc')->paginate(3);;
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PageBerita', ['berita'=>$berita,'pengaturan'=>$pengaturan]);
  }


}
