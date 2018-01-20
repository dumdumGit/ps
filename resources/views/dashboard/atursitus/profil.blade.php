@extends('dashboard.layouts.master')


@section('title')
  Pusat Studi Desain Otomotif | Atur Profil
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

  @if (Auth::user()->id = "3")
    <li class="treeview active">
      <a href="#"><i class="fa fa-desktop"></i> <span>Mengatur Situs</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
      </a>
      <ul class="treeview-menu">
        <li><a href="/aturheader"><i class="fa fa-edit"></i>Halaman Utama</a></li>
        <li class="active"><a href="/aturprofil"><i class="fa fa-edit"></i>Halaman Profil</a></li>
      </ul>
    </li>
  @endif
@endsection

@section('konten')
  <section class="content">
    <div class="row">
      <div class="col-md-12">

  <div class="box box-success">
    <div class="box-header with-border">
      <h3 class="box-title">Ubah Halaman Profil</h3> <br>
      <small>Disini anda dapat mengubah, pengaturan di halaman profil</small>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form method="post" action="aturprofil/update" class="form-horizontal">
      {{ csrf_field() }}
      <div class="box-body">
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

        <div class="form-group">
          <label class="col-sm-2 control-label">Script Halaman Profil :</label>
          <div class="col-sm-10">
            <textarea class="form-control" name="profil" rows="8" cols="80">
              {{$pengaturan->profil}}
            </textarea>
          </div>
        </div>

      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-success pull-right">Save</button>
        <input type="hidden" name="_method" value="PUT">
      </div>
      <!-- /.box-footer -->
    </form>
  </div>
  <!-- /.box -->

</div>
<!-- /.col-->
</div>
<!-- ./row -->
</section>
<!-- /.content -->


@endsection
