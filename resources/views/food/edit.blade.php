@extends('layouts.master')

@push('title')
Sunting Akun {{$user->name}}
@endpush

<?php
$name = explode(' ', trim($user->name))[0];
?>

@section('content')
<section class="edit">
  <h4 class="title">Sunting {{ $name }}</h4>
  <form action="/roles/{{ $user->id }}/update" method="POST">
    @csrf
    @method('PUT')
    <div class="field two">
      <div class="input">
        <label for="name">Nama<sup>*</sup></label>
        <input type="text" name="name" id="name" value="{{ $user->name }}">
      </div>
      <div class="input">
        <label for="email">Email<sup>*</sup></label>
        <input type="text" name="email" id="email" value="{{ $user->email }}">
      </div>
    </div>
    <div class="field">
      <div class="input">
        <label for="roles">Roles<sup>*</sup></label>
        <input type="text" name="roles" id="roles">
      </div>
    </div>
    <div class="field">
      <button class="btn primary">Update</button>
    </div>
  </form>
</section>
@endsection