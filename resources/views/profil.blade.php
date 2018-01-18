@extends('layouts.master')

@section('title')
  Pusat Studi Desain_Otomotif
@endsection

@section('listnya')
  <li><a href="/">Home</a></li>
  <li class="active"><a href="/profil">Profil</a></li>
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
  <div class="container">
    <div class="row">
      <h1 class="page-header">
        Profil
      </h1>
      <p>Untuk Mengganti halaman ini, bisa di backend, atau edit file -> resources -> views -> profil.blade.php</p>
    </div>
  </div>
@endsection
