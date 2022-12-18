@extends('layouts.master')

@push('title')
Sunting Akun {{$user->name}}
@endpush

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/roles/edit.css') }}">
@endpush

<?php
$name = explode(' ', trim($user->name))[0];
?>

@section('content')
<section class="edit">
  <h4 class="title">Sunting Roles {{ $name }}</h4>
  <form method="POST" action="/user/{{ $user->id }}/update">
    @csrf
    @method('PUT')
    <div class="field">
      <div class="input">
        <div class="input">
          <label for="email">Email<sup style="color:#f00">*</sup></label>
          <input type="text" id="email" value="{{ $user->email }}">
        </div>
      </div>
      <div class="input">
        <div class="input">
          <label for="password">Password<sup style="color:#f00">*</sup></label>
          <input type="password" id="password">
        </div>
      </div>
    </div>
    <div class="field">
      <div class="input">
        <label for="name">Nama<sup style="color:#f00">*</sup></label>
        <input type="text" id="name" value="{{ $user->name }}">
      </div>
    </div>
    <div class="field">
      <div class="input">
        <label for="nomor_telepon">Nomor Telepon<sup style="color:#f00">*</sup></label>
        <input type="text" id="nomor_telepon" name="phone_number" value="{{ $user->phone_number }}">
      </div>
      <div class="input">
        <label for="alamat">Alamat<sup style="color:#f00">*</sup></label>
        <input type="text" id="alamat" name="address" value="{{ $user->address }}">
      </div>
    </div>
    <div class="field">
      <button type="submit" class="btn primary" name="submit">Update</button>
    </div>
  </form>
</section>
@endsection