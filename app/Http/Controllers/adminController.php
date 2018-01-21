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

class adminController extends Controller
{

  public function __construct()
  {
      $this->middleware('auth');
      $this->middleware('rule:Super_Admin,Admin');
  }

  public function getDashboard() {
    return view("dashboard.index");
  }

    public function dataBeritaDT()
    {
        return Datatables::of(berita::query())
          ->addColumn('action', function ($berita) {
            if ($berita->jenis == "kegiatan") {
              $linknya = "/kegiatan/";
            } else {
              $linknya = "/berita/";
            }
              return
               '<a style="margin-left:5px" href="'.$linknya.$berita->sluglink.'" target="_blank" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
              .'<a style="margin-left:5px" href="'.$linknya.$berita->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</a>'
              .'<a style="margin-left:5px" href="'.$linknya.$berita->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
          })
          ->addColumn('namaAuthor', function($berita) {
            $namanya = DB::table('users')->where('id','=',$berita->author)->first()->name;
            return $namanya;
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
      $berita->judul = strip_tags(ucwords(Input::get('judul')));
      $berita->author = Auth::user()->id;
      $berita->content = Input::get('isinya');
      $berita->jenis = Input::get('jenis');
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
        return view('dashboard.berita.editberita', ['berita'=>$berita]);
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
        $berita->author = Auth::user()->id;
        $berita->content = Input::get('isinya');
        $berita->jenis = Input::get('jenis');
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


        //publikasi
        public function getPublikasiBaru()
        {
          return view('dashboard.publikasi.publikasibaru');
        }

        public function storepublikasiBaru(Request $request)
        {
          if ($request->hasFile('tes')) {
            $namafile = $request->file('tes')->getClientOriginalName();
            $ext = $request->file('tes')->getClientOriginalExtension();
            $lokasifileskr = '/storage/publikasi/'.$namafile;

            //cek jika file sudah ada...
            if(File::exists($lokasifileskr)){
              return Redirect::back()->withErrors(['file sudah ada, coba rename!']);
            }

            //cek jika nama judul materi ga ditulis
            if (empty(Input::get('judul'))) {
              return Redirect::back()->withErrors(['Nama Materi Tidak Boleh Kosong']);
            }

            //yg paling penting cek extension, no php allowed
            if ($ext == "pdf" || $ext == "png" || $ext == "jpg" || $ext == "docx" || $ext == "doc") {
              //store
              $destinasi = public_path('storage/publikasi/');
              $proses = $request->file('tes')->move($destinasi,$namafile);
              //masukin db
              $publikasi = new publikasi();
              $publikasi->judul = strip_tags(Input::get('judul'));
              $publikasi->konten = Input::get('desc');
              $publikasi->lokasi = $lokasifileskr;
              $publikasi->author = Auth::user()->id;
              $publikasi->save();
              return redirect('aturpublikasi')->with('status', 'File Berhasil Di Upload!');
            } else {
              return Redirect::back()->withErrors(['format file salah, tidak bisa diupload']);
            }
          } else {
            $publikasi = new publikasi();
            $publikasi->judul = strip_tags(Input::get('judul'));
            $publikasi->konten = Input::get('desc');
            $publikasi->lokasi = "";
            $publikasi->author = Auth::user()->id;
            $publikasi->save();
            return redirect('aturpublikasi')->with('status', 'Publikasi telah di publikasikan!');
          }
        }

        public function getAturPublikasi()
        {
          $materi = DB::table('publikasi')->get();
          return view('dashboard.publikasi.atur-publikasi', ['materi' => $materi]);
        }

        public function dataPublikasiDT()
        {
          if (Auth::user()->roles_id == "3") {
            return Datatables::of(publikasi::query())
                ->addColumn('action', function ($publikasi) {
                    return
                     '<a style="margin-left:5px" href="/publikasi/'.$publikasi->id.'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
                    .'<a style="margin-left:5px" href="/publikasi/'.$publikasi->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                    .'<a style="margin-left:5px" href="/publikasi/'.$publikasi->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
                })
                ->addColumn('namaAuthor', function($publikasi) {
                  $namanya = DB::table('users')->where('id','=',$publikasi->author)->first()->name;
                  return $namanya;
                })
                ->make(true);
          } else {
            $aktifuser = Auth::user()->id;
            $publikasiByAuthor = publikasi::where('author','=',$aktifuser)->get();

              //return Datatables::of(publikasi::query())
              return Datatables::of($publikasiByAuthor)
                  ->addColumn('action', function ($publikasi) {
                      return
                       '<a style="margin-left:5px" href="'.$publikasi->lokasi.'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
                      .'<a style="margin-left:5px" href="/publikasi/'.$publikasi->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                      .'<a style="margin-left:5px" href="/publikasi/'.$publikasi->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
                  })
                  ->addColumn('namaAuthor', function($publikasi) {
                    $namanya = DB::table('users')->where('id','=',$publikasi->author)->first()->name;
                    return $namanya;
                  })
                  ->make(true);
          }
        }

        public function getEditPublikasi($id)
        {
          $publikasi = publikasi::find($id);
          if(!$publikasi)
          abort(404);

          $user = Auth::user();
          if ($user->id == $publikasi->author) {
            return view('dashboard.publikasi.edit-publikasi', ['publikasi' => $publikasi]);
          } elseif (Auth::user()->roles_id == "3") {
            return view('dashboard.publikasi.edit-publikasi', ['publikasi' => $publikasi]);
          }
          else {
            echo "anda bukan penulis artikel tsb, jadi tidak bisa mengedit nya!";
          }
        }

        public function update_Publikasi(Request $request, $id)
        {
          if ($request->hasFile('tes')) {
            $namafile = $request->file('tes')->getClientOriginalName();
            $ext = $request->file('tes')->getClientOriginalExtension();
            $lokasifileskr = '/storage/publikasi/'.$namafile;

            //cek jika file sudah ada...
            if(File::exists($lokasifileskr)){
              return Redirect::back()->withErrors(['file sudah ada, coba rename!']);
            }

            //cek jika nama judul materi ga ditulis
            if (empty(Input::get('judul'))) {
              return Redirect::back()->withErrors(['Nama Materi Tidak Boleh Kosong']);
            }

            if ($ext == "pdf" ||
                $ext == "png" ||
                $ext == "jpg" ||
                $ext == "docx" ||
                $ext == "xlsx" ||
                $ext == "doc")
            {
              $publikasi = publikasi::find($id);
              //delete file sebelumnya
              $file = $publikasi->lokasi;
              if ($file == "") {
                $publikasi->delete();
                return redirect('aturpublikasi');
              }
              $filenya = str_replace("/storage","",$file);
              Storage::delete($filenya);

              //store file baru
              $destinasi = public_path('storage/publikasi/');
              $proses = $request->file('tes')->move($destinasi,$namafile);

              //masukin db
              $publikasi->judul = strip_tags(Input::get('judul'));
              $publikasi->konten = Input::get('desc');
              $publikasi->lokasi = $lokasifileskr;
              $publikasi->author = Auth::user()->id;
              $publikasi->save();
              return redirect('aturpublikasi')->with('status', 'File Berhasil Di Upload!');
            }
            else {
              return Redirect::back()->withErrors(['file tidak sesuai, tidak bisa diupload']);
            }

          }
          else {
            $publikasi = publikasi::find($id);
            $publikasi->judul = strip_tags(Input::get('judul'));
            $publikasi->save();
            return redirect('aturpublikasi')->with('status', 'Nama publikasi berhasil di ganti');
          }

        }

        public function destroyPublikasi($id)
        {
          $publikasi = publikasi::find($id);
          // $file = str_replace("storage","public",$materi->lokasi_materi);
          $file = $publikasi->lokasi;
          if ($file == "") {
            $publikasi->delete();
            return redirect('aturpublikasi');
          }
          $filenya = str_replace("/storage","",$file);
          //$file = str_replace("storage","public",$materi->lokasi_materi);
          Storage::delete($filenya);
          $publikasi->delete();
          return redirect('aturpublikasi');
        }


        public function getFileBaru() {
          return view('dashboard.files.filebaru');
        }

        public function StoreFileBaru(Request $request) {
          if ($request->hasFile('tes')) {
            $namafile = $request->file('tes')->getClientOriginalName();
            $ext = $request->file('tes')->getClientOriginalExtension();
            $lokasifileskr = '/storage/files/'.$namafile;

            if(Storage::has("files/".$namafile)) {
              return Redirect::back()->withErrors(['File sudah ada, coba rename file!']);
            }

            //yg paling penting cek extension, no php allowed
            if ($ext == "pdf" || $ext == "png" || $ext == "jpg" || $ext == "docx" || $ext == "doc") {
              //store
              $destinasi = public_path('storage/files/');
              $proses = $request->file('tes')->move($destinasi,$namafile);
              //masukin db
              $files = new files();
              $files->author = Auth::user()->id;
              $files->namafile = $namafile;
              $files->lokasi = $lokasifileskr;
              $files->save();
              return redirect('aturfile')->with('status', 'File Berhasil Di Upload!');
            } else {
              return Redirect::back()->withErrors(['format file salah, tidak bisa diupload']);
            }
          } else {
            return Redirect::back()->withErrors(['File tidak terbaca, tidak bisa diupload']);
          }
        }

        public function getAturFile() {
          return view("dashboard.files.atur-file");
        }

        public function dataFileDT() {
          return Datatables::of(files::query())
          ->addColumn('namaAuthor', function($files) {
            $namanya = DB::table('users')->where('id','=',$files->author)->first()->name;
            return $namanya;
          })
            ->addColumn('action', function ($files) {
                return
                 '<a style="margin-left:5px" href="'.$files->lokasi.'" target="_blank" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
                .'<a style="margin-left:5px" href="/file/'.$files->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
            })
            ->make(true);
        }

        public function DestroyFilebaru($id){
          $files = files::find($id);
          if (!$files) {
           abort(404);
          }

          $file = $files->lokasi;
          $filenya = str_replace("/storage","",$file);
          //$file = str_replace("storage","public",$materi->lokasi_materi);
          Storage::delete($filenya);
          $files->delete();
          return redirect('aturfile');
        }

        public function getAturRiset() {
          return view("dashboard.riset.atur-riset");
        }

        public function getTambahRiset() {
          return view("dashboard.riset.risetbaru");
        }

        public function PostRisetBaru(Request $request)
        {
          $judul = strtolower(Input::get('judul'));
          if(strlen($judul) > 30) {
            $judul = substr($judul, 0, 30);
          }
          $url = urlencode(strtolower($judul));
          $iduser = Auth::user()->id;
          $riset = new riset();
          $riset->sluglink = $url;
          $riset->judul = strip_tags(ucwords(Input::get('judul')));
          $riset->author = Auth::user()->id;
          $riset->konten = Input::get('isinya');
          $riset->excerpt = substr(strip_tags(Input::get('isinya')), 0, 400);

          $riset->save();
          return redirect('aturriset');
        }

        public function dataRisetDT()
        {
          if (Auth::user()->roles_id == "3") {
            return Datatables::of(riset::query())
              ->addColumn('action', function ($riset) {
                  return
                   '<a style="margin-left:5px" href="/riset/'.$riset->id.'" target="_blank" class="btn btn-xs btn-default"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
                  .'<a style="margin-left:5px" href="/riset/'.$riset->id.'/edit" class="btn btn-xs btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</a>'
                  .'<a style="margin-left:5px" href="/riset/'.$riset->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
              })
              ->make(true);
          } else {
            $aktifuser = Auth::user()->id;
            $risetByAuthor = riset::where('author','=',$aktifuser)->get();

              //return Datatables::of(publikasi::query())
              return Datatables::of($risetByAuthor)
                  ->addColumn('action', function ($riset) {
                      return
                       '<a style="margin-left:5px" href="'.$riset->sluglink.'" target="_blank" class="btn btn-xs btn-success"><i class="glyphicon glyphicon-star"></i> Lihat</a>'
                      .'<a style="margin-left:5px" href="/riset/'.$riset->id.'/edit" class="btn btn-xs btn-warning"><i class="glyphicon glyphicon-edit"></i> Edit</a>'
                      .'<a style="margin-left:5px" href="/riset/'.$riset->id.'/delete" class="btn btn-xs btn-danger"><i class="glyphicon glyphicon-minus"></i> Hapus</a>';
                  })
                  ->make(true);
          }
        }

        public function editRiset($id) {
          $riset = riset::find($id);
          if(!$riset)
          abort(404);
          $user = Auth::user();
          if ($user->id == $riset->author) {
            return view('dashboard.riset.editriset', ['riset' => $riset]);
          } elseif (Auth::user()->roles_id == "3") {
            return view('dashboard.riset.editriset', ['riset' => $riset]);
          }
          else {
            echo "anda bukan pembuat riset tsb, jadi tidak bisa mengedit nya!";
          }
        }

        public function risetUpdate(Request $request, $id) {
          $judul = strtolower(Input::get('judul'));
          if(strlen($judul) > 30) {
            $judul = substr($judul, 0, 30);
          }
          $url = urlencode(strtolower($judul));

          $riset = riset::find($id);
          $riset->sluglink = $url;
          $riset->judul = strip_tags(ucwords(Input::get('judul')));
          $riset->author = Auth::user()->id;
          $riset->konten = Input::get('isinya');
          $riset->excerpt = substr(strip_tags(Input::get('isinya')), 0, 400);

          $riset->save();
          return redirect('aturriset');
        }

        public function deleteRiset ($id) {
          $riset = riset::find($id);
          if(!$riset)
          abort(404);

          return view('dashboard.riset.deleteriset', ['riset'=>$riset]);
        }

        public function destroyRiset($id)
        {
          $riset = riset::find($id);
          $riset->delete();
          return redirect('aturriset');
        }



}
