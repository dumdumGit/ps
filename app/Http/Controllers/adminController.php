<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\pengguna;
use App\User;
use App\berita;
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

    public function dataBeritaDT()
    {
        return Datatables::of(berita::query())
          ->addColumn('action', function ($berita) {
              return
               '<a style="margin-left:5px" href="/berita/'.$berita->sluglink.'" target="_blank" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
              .'<a style="margin-left:5px" href="/berita/'.$berita->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</a>'
              .'<a style="margin-left:5px" href="/berita/'.$berita->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
          })
          ->make(true);

    }

    public function getAturBerita()
    {
      $berita = DB::table('berita')->get();
      return view('dashboard.berita.aturberita',['berita'=>$berita]);
    }

    public function getBeritaBaru()
    {
      return view('dashboard.berita.beritabaru');
    }

    public function postBeritaBaru(Request $request)
    {
      $judul = strtolower(Input::get('judul'));
      if(strlen($judul) > 30) {
        $judul = substr($judul, 0, 30);
      }
      $url = urlencode(strtolower($judul));
      $iduser = Auth::user()->id;
      $berita = new berita();
      $berita->sluglink = $url;
      $berita->author = Input::get('nama');
      $berita->judul = strip_tags(ucwords(Input::get('judul')));
      $berita->author = $iduser.",".Input::get('author');
      $berita->content = Input::get('isinya');
      $berita->excerpt = substr(strip_tags(Input::get('isinya')), 0, 400);

      $berita->save();
      return redirect('aturberita');
    }

    //ini buat view dimana kita bakalan nge set value ke form
      public function editBerita($id)
      {
        $berita = berita::find($id);
        if(!$berita)
        abort(404);
        $user = Auth::user();
        $idandnanme = explode(",",$berita->author);
        if ($user->id == $idandnanme[0] && $user->name == $idandnanme[1]) {
          return view('dashboard.berita.editberita', ['berita'=>$berita]);
        } else {
          echo "anda bukan penulis artikel tsb, jadi tidak bisa mengedit nya!";
        }
      }

    //ini buat setelah di klik post/put buat update data nya
      public function updateBerita(Request $request, $id)
      {
        $judul = strtolower(Input::get('judul'));
        if(strlen($judul) > 30) {
          $judul = substr($judul, 0, 30);
        }
        $url = urlencode(strtolower($judul));

        $berita = berita::find($id);
        $berita->sluglink = $url;
        $berita->author = Input::get('nama');
        $berita->judul = ucwords(Input::get('judul'));
        $berita->author = Input::get('author');
        $berita->content = Input::get('isinya');
        $berita->excerpt = substr(strip_tags(Input::get('isinya')), 0, 400);

        $berita->save();
        return redirect('aturberita');
      }

      //konsep sama....
        public function deleteBerita($id)
        {
          $berita = berita::find($id);
          if(!$berita)
          abort(404);

          return view('dashboard.berita.deleteberita', ['berita'=>$berita]);
        }

        public function destroyBerita($id)
        {
          $berita = berita::find($id);
          $berita->delete();
          return redirect('aturberita');
        }




}
