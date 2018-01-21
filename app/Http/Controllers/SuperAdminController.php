<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use App\pengguna;
use App\User;
use App\berita;
use App\publikasi;
use App\files;
use App\riset;
use App\pengaturan;
use Datatables;
use Illuminate\Support\Facades\Hash;
use Auth;
use Illuminate\Support\Facades\Input;
use Storage;
use Illuminate\Support\Facades\Redirect;
use File;

class SuperAdminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rule:Super_Admin,nothingelse');
  }

  //pengguna
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
    $rolesnya = DB::table('roles')->select('id')->where('namaRule', '=', 'User')->first()->id;
    $user = new User();
    $user->email = strip_tags(Input::get('email'));
    $user->name = strip_tags(Input::get('nama'));
    $user->password = bcrypt(Input::get('password'));
    $user->roles_id = $rolesnya;

    $user->save();
    return redirect('/pengguna');
  }

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

    public function getAturUtama() {
      $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
      return view("dashboard.atursitus.utama", ['pengaturan'=>$pengaturan]);
    }

    public function updateUtama(Request $request) {
      $pengaturan = pengaturan::find('1');
      $pengaturan->header = strip_tags(Input::get('header'));
      $pengaturan->tentang = Input::get('tentang');
      $pengaturan->visi = Input::get('visi');
      $pengaturan->misi = Input::get('misi');
      $pengaturan->telpon = Input::get('telpon');
      $pengaturan->alamat = Input::get('alamat');
      $pengaturan->email = Input::get('email');
      $pengaturan->footer3 = Input::get('footer3');
      $pengaturan->footer32 = Input::get('footer32');
      $pengaturan->save();
      return redirect('aturheader')->with('status', 'Pengaturan Disimpan');;
    }

    public function getAturLamanProfil() {
      $pengaturan = DB::table('pengaturan')->where('id','=','1')->first();
      return view("dashboard.atursitus.profil", ['pengaturan'=>$pengaturan]);
    }

    public function updateLamanProfil(Request $request) {
      $pengaturan = pengaturan::find("1");
      $pengaturan->profil = Input::get('profil');

      $pengaturan->save();
      return redirect('aturprofil')->with('status', 'Pengaturan berhasil disimpan!');
    }

}
