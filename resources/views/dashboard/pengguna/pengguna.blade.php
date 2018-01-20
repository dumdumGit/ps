@extends('dashboard.layouts.master')

@section('title')
  Desain Otomotif | Atur Pengguna
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
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Mengatur Pengguna<br>
    <small>Disini anda dapat mengatur pengguna situs ini</small>
  </h1>
</section>
<br>
<section class="content container-fluid">
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <!-- /.box-header -->
      <div class="box-body">
        @if($errors->any())
        <div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{$errors->first()}}
        </div>
        @endif
        <table id="users-table" class="table table-bordered table-hover datatable">
          <thead>
          <tr>
            <th>Id</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Roles</th>
            <th>Action</th>
          </tr>
          </thead>
          <tbody>

          </tbody>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <div class="box-body">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-user">
        Tambah User
      </button>
    </div>
    </div>
    </div>
  </section>


      <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript">
      $(document).ready(function() {
        $('#users-table').DataTable({
          "language": {
            "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Indonesian-Alternative.json"
          },
            processing: true,
            serverSide: true,
            ajax: '{{ url('pengguna/ajax') }}',
            columns: [
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'roles', name: 'roles'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
      });
      </script>

@endsection

@section('modals')
  <div class="modal fade" id="add-user">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah User</h4>
        </div>
        <div class="modal-body">
          <div class="box box-info">
              <div class="box-body">
                <form class="" action="" method="post">
                 {{ csrf_field() }}
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user"></i></span>
                  <input type="text" class="form-control" name="nama" placeholder="Nama">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                  <input type="email" class="form-control" name="email" placeholder="Email">
                </div>
                <br>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                  <input type="password" class="form-control" name="password" placeholder="Password">
                </div>
                <br>
            </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batalkan</button>
          <button type="submit" class="btn btn-primary" value="submit">Tambah User</button>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.modal -->
@endsection
