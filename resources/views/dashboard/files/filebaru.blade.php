@extends('dashboard.layouts.master')

@section('title')
  Pusat Studi Desain Otomotif | File
@endsection


@section('list')
  <li><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  @if (Auth::user()->roles_id == "3")
    <li><a href="/pengguna"><i class="fa fa-users"></i> <span>Mengatur Pengguna</span></a></li>
  @endif
  <li class="treeview">
    <a href="#"><i class="fa fa-newspaper-o"></i> <span>Mengatur Berita & Kegiatan</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/aturberita"><i class="fa fa-edit"></i> Edit/Hapus</a></li>
      <li><a href="/berita/baru"><i class="fa fa-plus"></i> Tambah</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-file"></i> <span>Mengatur Publikasi</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/aturpublikasi"><i class="fa fa-edit"></i>Edit/Hapus Publikasi</a></li>
      <li><a href="/publikasi/baru"><i class="fa fa-plus"></i>Tambah Publikasi</a></li>
    </ul>
  </li>

  <li class="treeview active">
    <a href="#"><i class="fa fa-bullseye"></i> <span>Mengatur File</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/aturfile"><i class="fa fa-edit"></i>Edit/Hapus File</a></li>
      <li class="active"><a href="/file/baru"><i class="fa fa-plus"></i>Tambah File</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-graduation-cap"></i> <span>Mengatur Riset</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/aturriset"><i class="fa fa-edit"></i>Edit/Hapus Riset</a></li>
      <li><a href="/riset/baru"><i class="fa fa-plus"></i>Tambah Riset</a></li>
    </ul>
  </li>

  <li class="treeview">
    <a href="#"><i class="fa fa-desktop"></i> <span>Mengatur Situs</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/aturheader"><i class="fa fa-edit"></i>Halaman Utama</a></li>
      <li><a href="/aturprofil"><i class="fa fa-edit"></i>Halaman Profil</a></li>
    </ul>
  </li>
@endsection

@section('konten')
  <div class="container">
    <div style="margin-top:40px;" class="row">
  <div class="col-md-3">

  </div>

  <div class="col-md-6 text-center">
    <div class="box box-info">
      <div class="box-header">
        <section class="content-header">
          <h1>
            Menambah Files<br>
            <small>Disini anda dapat Menambah Files, dapat berupa gambar dan dokumen</small>
          </h1>
        </section>
      </div>

   <div class="box-body pad">
     @if($errors->any())
         <div class="alert alert-danger alert-dismissible">
         <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
         {{$errors->first()}}
         </div>
     @endif

           @if (session('status'))
           <div class="alert alert-info alert-dismissible">
           <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
           {{ session('status') }}
           </div>
           @endif
    <form action="/file/baru" enctype="multipart/form-data" method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <label for="exampleInputFile">Input File</label>
        <center>
        <input accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,
text/plain, application/pdf, image/*" type="file" name="tes" id="exampleInputFile">
        </center>
        <p class="help-block">File yg diterima : pdf, doc, gambar</p>
      </div>
      <input type="hidden" name="author" value="{{Auth::user()->name}}">
      <input class="btn btn-info" type="submit" name="submit" value="Upload">
    </form>
  </div>


</div>
</div>
</div>
</div>
@endsection
