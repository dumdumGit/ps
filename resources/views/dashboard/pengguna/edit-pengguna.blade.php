@extends('dashboard.layouts.master')

@section('list')
  <li><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  <li class="active"><a href="/pengguna"><i class="fa fa-users"></i> <span>Mengatur Pengguna</span></a></li>
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
  <section class="content-header">
    <h1>
      Mengatur Pengguna<br>
      <small>Disini anda dapat mengatur pengguna situs ini</small>
    </h1>
  </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Edit Pengguna ID : {{$user->id}}</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="post" action="/pengguna/{{$user->id}}">
                    {{ csrf_field() }}
                    <div class="box-body">
                      <div class="form-group">
                        <label for="">Nama Pengguna</label>
                        <input type="text" name="nama" class="form-control" value="{{$user->name}}">
                      </div>
                      <div class="form-group">
                        <label for="">Email Pengguna</label>
                        <input type="email" name="email" class="form-control" value="{{$user->email}}" >
                      </div>
                      <div class="form-group">
                        <label for="">Roles Pengguna</label>
                        <select class="form-control" name="roles">
                          <?php
                            $roles = DB::table('roles')->get();
                          ?>
                          @foreach ($roles as $role)
                            <option class="form-control" value="{{$role->id}}">{{$role->namaRule}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="box-footer">
                      <input class="btn btn-info" type="submit" name="submit" value="submit">
                      <input type="hidden" name="_method" value="PUT">
                    </div>
                    </form>
                    </div>
        </div>
      </div>
    </section>
@endsection
