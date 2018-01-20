<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Pusat Studi Desain Otomotif</title>
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- CSS
        ================================================ -->
        <!-- Owl Carousel -->
				<link rel="stylesheet" href="{{ URL::asset('css/owl.carousel.css') }}">
		        <!-- bootstrap.min css -->
				<link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css') }}">
		        <!-- Font-awesome.min css -->
				<link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css') }}">
				<!-- Main Stylesheet -->
				<link rel="stylesheet" href="{{URL::asset('css/animate.min.css') }}">

				<link rel="stylesheet" href="{{URL::asset('css/main.css') }}">
		        <!-- Responsive Stylesheet -->
				<link rel="stylesheet" href="{{URL::asset('css/responsive.css') }}">
		<!-- Js -->
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
    <script>window.jQuery || document.write('<script src="{{ URL::asset('js/vendor/jquery-1.10.2.min.js')}}"><\/script>')</script>
		<script src="{{ URL::asset('js/jquery.nav.js')}}"></script>
    <script src="{{ URL::asset('js/jquery.sticky.js')}}"></script>
    <script src="{{ URL::asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ URL::asset('js/plugins.js')}}"></script>
    <script src="{{ URL::asset('js/wow.min.js')}}"></script>
    <script src="{{ URL::asset('js/main.js')}}"></script>
	</head>
	<body>
	<!--
	header-img start
	============================== -->
    <section id="hero-area">
      <img class="img-responsive" src="{{$pengaturan->header}}" alt="">
    </section>
	<!--
    Header start
	============================== -->
	<nav id="navigation">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="block">
                        <nav class="navbar navbar-default">
                          <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                              </button>
                                  <a class="navbar-brand" href="#">
                                   <h3>Pusat Studi Desain_Otomotif</h3>
                                  </a>

                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav navbar-right" id="top-nav">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/profil">Profil</a></li>
                                <li><a href="/berita">Berita</a></li>
                                <li><a href="/publikasi">Publikasi</a></li>
                                <li><a href="/kegiatan">Kegiatan</a></li>
                                <li><a href="/riset">Riset</a></li>
                                <li><a href="/kerjasama">Kerjasama</a></li>
																<li><a href="/forum">Forum</a></li>
																<li><a href="/konsultasi">Konsultasi</a></li>
																<li><a href="/video">Video</a></li>
                              </ul>
                            </div><!-- /.navbar-collapse -->
                          </div><!-- /.container-fluid -->
                        </nav>
                    </div>
                </div><!-- .col-md-12 close -->
            </div><!-- .row close -->
        </div><!-- .container close -->
	</nav><!-- header close -->
	<!-- Html Style -->
	<div class="container">
		<div class="row">
			@if ($user = Auth::user())
				<div class="col-md-4">

						<div class="form-group panel panel-default">
							<div class="panel-heading">
								User
							</div>
							<div class="panel-body">
								<p>Nama anda : {{$user->name}}</p>
								<?php
									$rolesnya = DB::table('roles')->where('id','=',$user->roles_id)->first()->namaRule;
								 ?>
								 @if ($rolesnya == "Super_Admin")
									 <p>Roles anda : {{$rolesnya}}</p>
									 <br>
									 <a class="btn btn-sm btn-orange" href="/dashboard">Dashboard</a>
									 <a class="pull-right btn btn-sm btn-orange" href="/logout">Log Out</a>
								 @elseif ($rolesnya == "Admin")
									 <p>Roles anda : {{$rolesnya}}</p>
									 <br>
									 <a class="btn btn-sm btn-orange" href="/dashboard">Dashboard</a>
									 <a class="pull-right btn btn-sm btn-orange" href="/logout">Log Out</a>
									@else
										<p>Roles anda : {{$rolesnya}}</p> <br>
											<a class="pull-right btn btn-sm btn-orange" href="/logout">Log Out</a>
								 @endif

							</div>
						</div>
				</div>
				@else
					<div class="col-md-4">
						<form method="post" action="{{url(action("loginController@postLogin"))}}">
							<div class="form-group panel panel-default">
								<div class="panel-heading">
									<h3>Login</h3>
								</div>
								<div class="input-group input-group-sm panel-body">
									{{ csrf_field() }}
									<input name="email" style="margin-bottom:10px;" type="email" class="form-control" placeholder="Email">
									<input name="password" style="margin-bottom:10px;" type="password" class="form-control" placeholder="Password">
									<br>
									<button style="margin-bottom:10px;" type="submit" class="btn btn-sm btn-orange"><span>Login</span></button>
									<br>
									<p>Belum memiliki akun?  <a href="/register">Buat Akun</a></p>
								</div>
							</div>
							<div id="form-subscribe-footer" class="form-output"></div>
						</form>
					</div>
			@endif





			<div class="col-md-8">
				<h2 class="heading-line text-center">Tentang Pusat Studi Desain Otomotif/CARS </h2>
				<div class="row mt-50">
					<div class="col-xs-12">
						<p style="font-size:20px;">
							{{$pengaturan->tentang}}
						</p>
					</div>
				</div> <!-- end row -->
			</div>
{{--
		  <div class="col-md-3">

			</div> --}}


		</div>
	</div>
	<section class="section-wrap pb-0">
		<div class="container">
			<br>
			<div class="row">
			<h2 class="heading-line text-center">Visi dan Misi</h2>
				<div class="col-sm-6">
					<blockquote class="blockquote-style-1 mb-30">
							<b>Visi : </b>
							<br>
							{{$pengaturan->visi}}
					</blockquote>
				</div>
				<div class="col-sm-6">
					<blockquote class="blockquote-style-2">
						<b>Misi : </b>
						<br>
						{{$pengaturan->misi}}
					</blockquote>
				</div>
			</div>
		</div> <!-- end container -->
	</section> <!-- end html style -->


	<!-- From Blog -->
<section class="section-wrap from-blog style-2 pb-90 bg-light">
	<div class="container">

		<div class="row mb-60">
			<div class="col-md-12 text-center">
				<h2>Berita Terbaru</h2>
				<br>
			</div>
		</div>

		<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
			<div class="blog-col">
				<div class="entry-img">
					<img src="images/polricat.jpg" alt="">
				</div>
				<div class="entry-box">
					<h4 class="entry-title"><a href="blog-single.html">KERJASAMA UJIAN CAT POLDA DENGAN UNIVERSITAS GUNADARMA</a></h4>
					<ul class="entry-meta">
						<li>July 10, 2015</li>
						<li><a href="blog-single.html">10 Comments</a></li>
					</ul>
					<div class="entry-content">
						<p>Universitas Gunadarma dipilih bekerjasama dengan Polda Metro Jaya untuk memfasilitasi seleksi penerimaan anggota Kepolisian Negara Republik Indonesia ‎(Polri) dengan sistem CAT (Computer Assited Test).</p>
						<a href="blog-single.html" class="btn btn-sm btn-orange">Baca Selengkapnya</a>
					</div>
				</div>
			</div>
		</div> <!-- end post -->

		<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
			<div class="blog-col">
				<div class="entry-img">
					<img src="images/baak.jpg" alt="">
				</div>
				<div class="entry-box">
					<h4 class="entry-title"><a href="blog-single.html" class="dark-link">BATAS AKHIR PENGAMBILAN KRS</a></h4>
					<ul class="entry-meta">
						<li>July 10, 2015</li>
						<li><a href="blog-single.html">10 Comments</a></li>
					</ul>
					<div class="entry-content">
						<p>Dengan ini diberitahukan kepada seluruh mahasiswa Universitas Gunadarma mengenai hal-hal sebagai...</p>
						<a href="blog-single.html" class="btn btn-sm btn-orange">Baca Selengkapnya</a>
					</div>
				</div>
			</div>
		</div> <!-- end post -->

		<div class="col-md-4 col-sm-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
			<div class="blog-col last">
				<div class="entry-img">
					<img src="images/ec.png" alt="">
				</div>
				<div class="entry-box">
					<h4 class="entry-title"><a href="blog-single.html">English Competition 2017</a></h4>
					<ul class="entry-meta">
						<li>July 10, 2015</li>
						<li><a href="blog-single.html">10 Comments</a></li>
					</ul>
					<div class="entry-content">
						<p>Dalam rangka memperingati hari Sumpah Pemuda dan Hari Pahlawan, Fakultas Sastra Universitas Gunadarma akan mengadakakan English Competition, yang akan diadakan pada hari Senin, 13 November 2017, pukul 09.00 s/d 17.00 WIB, di D46. Registrasi mulai pukul 08.00 WIB.</p>
						<a href="blog-single.html" class="btn btn-sm btn-orange">Baca Selengkapnya</a>
					</div>
				</div>
			</div>
		</div> <!-- end post -->

	</div>
</section> <!-- end from blog -->





    <!--
    footer  start
    ============================= -->
    <section id="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="block wow fadeInLeft"  data-wow-delay="200ms">
                        <h3>Kontak <span>Info</span></h3>
                        <div class="info">
                            <ul>
                                <li>
                                  <h4><i class="fa fa-phone"></i>Telpon</h4>
                                  <p>{{$pengaturan->telpon}}</p>

                                </li>
                                <li>
                                  <h4><i class="fa fa-map-marker"></i>Alamat</h4>
                                  <p>{{$pengaturan->alamat}}</p>
                                </li>
                                <li>
                                  <h4><i class="fa fa-envelope"></i>E-mail</h4>
                                  <p>{{$pengaturan->email}}</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .col-md-4 close -->
                <div class="col-md-4">
                    <div class="block wow fadeInLeft"  data-wow-delay="700ms">
                        <h3>Berita <span> Terbaru</span></h3>
                        <div class="blog">
                            <ul>
                                <li>
                                    <h4><a href="#">Kerjasama ujian CAT Polda dengan Universitas Gunadarma</a></h4>
                                    <p>Universitas Gunadarma dipilih bekerjasama dengan Polda Metro Jaya untuk memfasilitasi seleksi penerimaan anggota Kepolisian Negara Republik Indonesia ‎(Polri) dengan sistem CAT (Computer Assited Test).</p>
                                </li>
                                <li>
                                    <h4><a href="#">Batas Akhir Pengambilan KRS</a></h4>
                                    <p>Dengan ini diberitahukan kepada seluruh mahasiswa Universitas Gunadarma mengenai hal-hal sebagai berikut :
                                   </p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- .col-md-4 close -->
                <div class="col-md-4">
                    <div class="block wow fadeInLeft"  data-wow-delay="1100ms">
                        <div class="gallary">
                            <h3>Universitas <span>Gunadarma</span></h3>
                            <a target="_blank" href="http://gunadarma.ac.id"><img class="img-responsive" src="images/logogundar.png" /></a>
                        </div>
                    </div>
                </div>
                <!-- .col-md-4 close -->
            </div><!-- .row close -->
        </div><!-- .containe close -->
    </section><!-- #footer close -->
    <!--
    footer-bottom  start
    ============================= -->
    <footer id="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="block">
                        <p> Pusat Studi Desain Otomotif, Coded by <a href="http://c3budiman.web.id">c3budiman</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

	</body>
</html>
