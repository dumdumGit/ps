@extends('dashboard.layouts.master')

@section('title')
  Pusat Studi Desain Otomotif | Berita
@endsection

@section('list')
  <li><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  @if (Auth::user()->roles_id == "3")
    <li><a href="/pengguna"><i class="fa fa-users"></i> <span>Mengatur Pengguna</span></a></li>
  @endif
  <li class="treeview active">
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

  <li class="treeview">
    <a href="#"><i class="fa fa-bullseye"></i> <span>Mengatur File</span>
      <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
      <li><a href="/aturfile"><i class="fa fa-edit"></i>Edit/Hapus File</a></li>
      <li><a href="/file/baru"><i class="fa fa-plus"></i>Tambah File</a></li>
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

  @if (Auth::user()->roles_id == "3")
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
  @endif
@endsection

@section('konten')
  <!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-info">
        <div class="box-header">
          <section class="content-header">
            <h1>
              Mengedit Berita Dan Kegiatan<br>
              <small>Disini anda dapat mengubah Postingan Berita Dan Kegiatan</small>
            </h1>
          </section>
        </div>
        <!-- /.box-header -->
        <div class="box-body pad">
          <form method="post" action="/berita/{{$berita->id}}">
            {{ csrf_field() }}
            <input type="hidden" name="author" value="{{Auth::user()->name}}">
            <input disabled value="{{$berita->judul}}" class="form-control" style="width:100%" type="text" name="judul" placeholder="Judul">
            <br>
                <textarea disabled name="isinya" id="editor1" name="editor1" rows="10" cols="80">
                  {{$berita->content}}
                </textarea>
                <br>
                <input class="btn btn-danger" type="submit" name="submit" value="Delete">
                <a href="/aturberita" class="btn btn-info">Batal</a>
                <input type="hidden" name="_method" value="delete">
          </form>
        </div>
      </div>
      <!-- /.box -->
      </div>
      <!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->
@endsection
