@extends('dashboard.layouts.master')

@section('title')
	Desain Otomotif
@endsection

@section('list')
  <li class="active"><a href="/dashboard"><i class="fa fa-home"></i> <span>Dashboard</span></a></li>
  <li><a href="/pengguna"><i class="fa fa-users"></i> <span>Mengatur Pengguna</span></a></li>
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
@endsection

@section('header')
	<section class="content-header">
		<h1>
			Admin Dashboard<br>
			<small>Selamat datang di admin dashboard Pusat Studi Desain Otomotif</small>
		</h1>
	</section>
@endsection


@section('konten')
<div class="container">
	<div class="row">
		@if($errors->any())
		<div class="alert alert-danger alert-dismissible">
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		{{$errors->first()}}
		</div>
		@endif
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-aqua">
				<div class="inner">
					<h3><?php
						$users = DB::table('users')->count();
						echo $users;
					?></h3>

					<p>Pengguna Terdaftar</p>
				</div>
				<div class="icon">
					<i class="ion ion-person-add"></i>
				</div>
				<a href="/pengguna" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->

		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-green">
				<div class="inner">
					<h3>3</h3>

					<p>Berita diterbitkan</p>
				</div>
				<div class="icon">
					<i class="ion ion-load-a"></i>
				</div>
				<a href="/aturberita" class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-yellow">
				<div class="inner">
					<h3>3</h3>

					<p>Materi yang diupload</p>
				</div>
				<div class="icon">
					<i class="ion ion-stats-bars"></i>
				</div>
				<a href="/atur-materi" class="small-box-footer">Lebih lanjut <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<div class="col-lg-3 col-xs-6">
			<!-- small box -->
			<div class="small-box bg-red">
				<div class="inner">
					<h3>3</h3>

					<p>Mahasiswa dalam tabel kelulusan</p>
				</div>
				<div class="icon">
					<i class="ion ion-pie-graph"></i>
				</div>
				<a href="/atur-kelulusan" class="small-box-footer">Lebih Lanjut <i class="fa fa-arrow-circle-right"></i></a>
			</div>
		</div>
		<!-- ./col -->
	</div>

	<!-- START ACCORDION & CAROUSEL-->
	<h2 class="page-header">Cara Penggunaan Situs</h2>

	<div class="row">
		<div class="col-md-12">
			<div class="box box-solid">
				<div class="box-body">
					<div class="box-group" id="accordion">
						<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
						<div class="panel box box-primary">
							<div class="box-header with-border">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
										Pengaturan Berita, Materi, Jadwal, dan Kelulusan
									</a>
								</h4>
							</div>
							<div id="collapseOne" class="panel-collapse collapse in">
								<div class="box-body">
									Untuk mengatur berita, file materi, jadwal dan kelulusan dapat dilihat pada tab edit di masing masing pengaturan.
									<img src="/storage/tes.png" alt="">
								</div>
							</div>
						</div>
						<div class="panel box box-danger">
							<div class="box-header with-border">
								<h4 class="box-title">
									<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
										Untuk menjaga keamanan situs
									</a>
								</h4>
							</div>
							<div id="collapseTwo" class="panel-collapse collapse">
								<div class="box-body">
									Disarankan menggunakan password yang mudah diingat, dan random,
									tujuan nya untuk menghindari hacking kepada situs, karena semua user dapat melakukan edit berita dan halaman.
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
	</div>
	<!-- /.row -->
	<!-- END ACCORDION & CAROUSEL-->
	</div>

@endsection
