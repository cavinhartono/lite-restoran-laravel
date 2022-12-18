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
  <form method="POST" action="/roles/{{ $user->id }}/update">
    @csrf
    @method('PUT')
    <div class="field">
      <div class="input">
        <label for="name">Nama<sup style="color:#f00">*</sup></label>
        <input disabled type="text" id="name" value="{{ $user->name }}">
      </div>
      <div class="input">
        <label for="email">Email<sup style="color:#f00">*</sup></label>
        <input disabled type="text" id="email" value="{{ $user->email }}">
      </div>
    </div>
    <div class="field">
      <div class="input">
        <label for="roles">Roles<sup style="color:#f00">*</sup></label>
        <select name="role" id="roles" @foreach ($user->roles as $role) @if($role->id == 1) disabled @endif @endforeach>
          @foreach ($roles as $role)
          @if ($role->id == 1)
          <option value="{{ $role->name }}" disabled>{{ $role->name }}</option>
          @else
          <option value="{{ $role->name }}">{{ $role->name }}</option>
          @endif
          @endforeach
        </select>
      </div>
    </div>
    <div class="field">
      <button type="submit" class="btn primary" name="submit">Update</button>
    </div>
  </form>
</section>
@endsection