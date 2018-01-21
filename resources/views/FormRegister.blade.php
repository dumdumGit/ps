@extends('layouts.master')

@section('title')
  Pusat Studi Desain_Otomotif
@endsection

@section('listnya')
  <li><a href="/">Home</a></li>
  <li><a href="/profil">Profil</a></li>
  <li><a href="/berita">Berita</a></li>
  <li><a href="/publikasi">Publikasi</a></li>
  <li><a href="/kegiatan">Kegiatan</a></li>
  <li><a href="/riset">Riset</a></li>
  <li><a href="/kerjasama">Kerjasama</a></li>
  <li><a href="/forum">Forum</a></li>
  <li><a href="/konsultasi">Konsultasi</a></li>
  <li><a href="/video">Video</a></li>
@endsection

@section('konten')
  <div class="formnya">
    <div class="container">

      <form class="form-signin" action="{{url(action('regisController@postRegis'))}}" method="post">
        {{ csrf_field() }}
        <h2 style="margin-top:20px;" class="form-signin-heading">Form pendaftaran user</h2>

        <label>Nama : </label>
        <input type="text" name="nama" id="inputnama" class="form-control" placeholder="Masukkan nama" required>
        <div style="padding-bottom: 10px;"></div>

        <label>Email : </label>
        <input type="email" name="email" id="inputemail" class="form-control" placeholder="Masukkan email" required>

        <label>Password : </label>
        <input id="password" type="password" name="password" class="form-control" placeholder="Masukkan password" required>

        <label>Password lagi : </label>
        <input id="confirm_password" type="password" class="form-control" placeholder="Masukkan password lagi" required>
        <div style="padding-bottom: 10px;"></div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Daftar</button>
        <label>Sudah punya akun? <a href="/">Login</a></label> <br>
        <label>kembali ke <a href="/">Beranda</a></label>
      </form>
      @if($errors->any())
        <div class="alert alert-danger">>
            <h4>{{$errors->first()}}</h4>
        </div>
      @endif
    </div>
  </div>
  <script type="text/javascript">
  var password = document.getElementById("password")
  , confirm_password = document.getElementById("confirm_password");

  function validatePassword(){
    if(password.value != confirm_password.value) {
      confirm_password.setCustomValidity("Password nya tidak sama!");
    } else {
      confirm_password.setCustomValidity('');
    }
  }

  password.onchange = validatePassword;
  confirm_password.onkeyup = validatePassword;

  </script>
@endsection
