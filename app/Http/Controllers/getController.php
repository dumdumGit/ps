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
    $beritanya = DB::table('berita')
    ->whereIn('jenis', ['berita_umum','berita_penting'])
    ->where('sluglink','=',$slug)
    ->first();
    if(!$beritanya)
    abort(404);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('BeritaSingle', ['beritanya'=>$beritanya,'pengaturan'=>$pengaturan]);
  }

  public function getPageBerita() {
    $berita = DB::table('berita')
    ->whereIn('jenis', ['berita_umum','berita_penting'])
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PageBerita', ['berita'=>$berita,'pengaturan'=>$pengaturan]);
  }

  public function PencarianBerita(Request $request) {
    $berita = DB::table('berita')
    //->where('jenis','=','berita_umum')
    ->whereIn('jenis', ['berita_umum','berita_penting'])
    ->where('content', 'like', '%' . $request->search . '%')
    ->orWhere('judul', 'like', '%' . $request->search . '%')
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $query = $request->search;
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PageBerita', ['berita'=>$berita,'pengaturan'=>$pengaturan,'query'=>$query]);
  }

  public function getPublikasiSingle($id) {
    $publikasi = DB::table('publikasi')->where('id','=',$id)->first();
    if(!$publikasi)
    abort(404);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PublikasiSingle', ['publikasi'=>$publikasi,'pengaturan'=>$pengaturan]);
  }

  public function getPagePublikasi() {
    $publikasi = DB::table('publikasi')
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PagePublikasi', ['publikasi'=>$publikasi,'pengaturan'=>$pengaturan]);
  }

  public function PencarianPublikasi(Request $request) {
    $publikasi = DB::table('publikasi')
    ->where('konten', 'like', '%' . $request->search . '%')
    ->orWhere('judul', 'like', '%' . $request->search . '%')
    ->orWhere('lokasi', 'like', '%' . $request->search . '%')
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $query = $request->search;
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PagePublikasi', ['publikasi'=>$publikasi,'pengaturan'=>$pengaturan,'query'=>$query]);
  }

  public function getKegiatanSingle($slug) {
    $berita = DB::table('berita')->get();
    $beritanya = DB::table('berita')
    ->where('jenis','=','kegiatan')
    ->where('sluglink','=',$slug)
    ->first();
    if(!$beritanya)
    abort(404);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('kegiatanSingle', ['beritanya'=>$beritanya,'pengaturan'=>$pengaturan]);
  }

  public function getPageKegiatan() {
    $berita = DB::table('berita')
    ->where('jenis','=','kegiatan')
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PageKegiatan', ['berita'=>$berita,'pengaturan'=>$pengaturan]);
  }

  public function PencarianKegiatan(Request $request) {
    $berita = DB::table('berita')
    ->where('jenis','=','kegiatan')
    ->where('content', 'like', '%' . $request->search . '%')
    ->orWhere('judul', 'like', '%' . $request->search . '%')
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $query = $request->search;
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PageKegiatan', ['berita'=>$berita,'pengaturan'=>$pengaturan,'query'=>$query]);
  }

  public function getRisetSingle($slug) {
    $beritanya = DB::table('riset')
    ->where('sluglink','=',$slug)
    ->first();
    if(!$beritanya)
    abort(404);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('RisetSingle', ['beritanya'=>$beritanya,'pengaturan'=>$pengaturan]);
  }

  public function getPageRiset() {
    $berita = DB::table('riset')
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PageRiset', ['berita'=>$berita,'pengaturan'=>$pengaturan]);
  }

  public function PencarianRiset(Request $request) {
    $berita = DB::table('riset')
    ->where('konten', 'like', '%' . $request->search . '%')
    ->orWhere('judul', 'like', '%' . $request->search . '%')
    ->orderBy('updated_at', 'desc')
    ->paginate(3);
    $query = $request->search;
    $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
    return view('PageRiset', ['berita'=>$berita,'pengaturan'=>$pengaturan,'query'=>$query]);
  }

}
