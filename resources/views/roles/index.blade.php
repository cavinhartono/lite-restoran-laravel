@extends('layouts.master')

@push('title')
Roles
@endpush

@section('content')
<section class="roles">
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Role</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->role }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <a href="/roles/{{ $user->id }}/edit">Edit</a>
          <a href="/roles/{{ $user->id }}/delete">Delete</a>
        </td>
      </tr>
      @empty
      <tr>
        <td>Tidak Ada Data User</td>
      </tr>
      @endforelse
    </tbody>
    <tfoot>
      <tr>
        <th>ID</th>
        <th>Role</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</section>
@endsection