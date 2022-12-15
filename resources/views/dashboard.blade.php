@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }} ">
@endpush

@push('title')
Home
@endpush

@section('content')
<section class="home">
  @if (Session::get('success'))
  <div class="greating">
    <span class="message">{{ Session::get('success') }}</span>
  </div>
  @endif
  <div class="home_content">
    <ul class="info">
      <li class="list">
        <p class="title">Nama</p>
        <p class="subtitle" style="font-weight: 500;">Cavin Hartono Putra</p>
      </li>
      <li class="list">
        <p class="title">Email</p>
        <p class="subtitle" style="font-weight: 500;">cavin@gmail.com</p>
      </li>
      <li class="list">
        <p class="title">Roles</p>
        <p class="subtitle" style="font-weight: 500;">User</p>
      </li>
    </ul>
  </div>
</section>
@endsection