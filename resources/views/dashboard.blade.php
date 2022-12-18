@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }} ">
@endpush

@push('title')
Home
@endpush

<?php

function salam($name)
{
  date_default_timezone_set('Asia/Jakarta');
  $hour = date("G");
  $user = explode(' ', trim($name))[0];

  if ((int)$hour == 0 && (int)$hour <= 9) {
    $greet = "<b>Selamat pagi</b>, $user";
  } else if ((int)$hour >= 10 && (int)$hour <= 11) {
    $greet = "<b>Selamat siang</b>, $user";
  } else if ((int)$hour >= 12 && (int)$hour <= 17) {
    $greet = "<b>Selamat sore</b>, $user";
  } else if ((int)$hour >= 18 && (int)$hour <= 23) {
    $greet = "<b>Selamat malam</b>, $user";
  } else {
    $greet = "Welcome, $user";
  }

  echo $greet;
}
?>

@section('content')
<section class="home">
  @if (Session::get('success'))
  <div class="greating">
    <span class="message">{{ Session::get('success') }}</span>
  </div>
  @endif
  <div class="home_content">
    <div class="header_content">
      <ul class="info">
        <li class="list">
          <p class="title">Nama</p>
          <p class="subtitle" style="font-weight: 500;">{{ Auth::user()->name }}</p>
        </li>
        <li class="list">
          <p class="title">Email</p>
          <p class="subtitle" style="font-weight: 500;">{{ Auth::user()->email }}</p>
        </li>
        <li class="list">
          <p class="title">Roles</p>
          <p class="subtitle" style="font-weight: 500; text-transform: capitalize;">{{ Auth::user()->roles->first()->name }}</p>
        </li>
      </ul>
      <div class="salam_jastok">
        <div class="nama_akun">
          <p class="title">{{ salam(Auth::user()->name) }}</p>
          <p class="subtitle">Semoga harimu menyenangkan!</p>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection