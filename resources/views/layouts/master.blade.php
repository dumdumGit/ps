<!DOCTYPE html>
<html class="no-js">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>@yield('title')</title>
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
    <script src="{{ URL::asset('assets/js/jquery-ui-1.12.1.custom.min.js')}}"></script>
    <script src="{{ URL::asset('js/vendor/modernizr-2.6.2.min.js')}}"></script>
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
      <img class="img-responsive" src="{{ asset('images/banner.jpg'); }}" alt="">
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
                                   <h3>@yield('title')</h3>
                                  </a>

                            </div>

                            <!-- Collect the nav links, forms, and other content for toggling -->
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                              <ul class="nav navbar-nav navbar-right" id="top-nav">
                                @yield('list')
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
      @yield('kontendalam')
		</div>
	</div>

  @yield('konten')

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
                                  <p>0857701XXXX(SMS only)</p>

                                </li>
                                <li>
                                  <h4><i class="fa fa-map-marker"></i>Alamat</h4>
                                  <p>Jalan Margonda Raya No 100.</p>
                                </li>
                                <li>
                                  <h4><i class="fa fa-envelope"></i>E-mail</h4>
                                  <p>admin@ps-otomotif.gunadarma.ac.id</p>

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
