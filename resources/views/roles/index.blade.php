@extends('layouts.master')

@push('title')
Roles
@endpush

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/roles/roles.css') }}">
@endpush

@section('content')
<section class="roles">
  <div class="figure">
    <h4 class="title">Kumpulan Roles</h4>
  </div>
  <table class="table">
    <thead style="background: #fafafa">
      <tr>
        <th></th>
        <th>Role</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      @forelse ($users as $user)
      <tr style="border-bottom: 1px solid #ddd;">
        <td style="text-align: center">{{ $loop->iteration }}</td>
        <td style="text-transform: capitalize;">
          @forelse ($user->roles as $role)
          {{ $role->name }}
          @empty
          user
          @endforelse
        </td>
        <td style="font-weight: 500;">{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>
          <a href="/roles/{{ $user->id }}/edit">
            <span class="icon">Edit</span>
          </a>
          <button onclick="document.querySelector('.delete').classList.add('active')">Delete</button>
          <div class="delete">
            <div class="content">
              <div class="content_title">
                <h2>Apakah {{ $user->name }} dihapus?</h2>
              </div>
              <div class="content_button">
                <form action="/roles/{{ $user->id }}/delete" method="POST">
                  @csrf
                  @method('DELETE')
                  <span class="icon">Delete</span>
                </form>
                <button onclick="document.querySelector('.delete').classList.remove('active')">Tidak</button>
              </div>
            </div>
          </div>
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
        <th></th>
        <th>Role</th>
        <th>Name</th>
        <th>Email</th>
        <th>Action</th>
      </tr>
    </tfoot>
  </table>
</section>
@endsection