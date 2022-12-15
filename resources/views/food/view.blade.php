@extends('layouts.master')

@push('style')
<link rel="stylesheet" href="{{ asset('assets/css/view.css') }}">
@endpush

@section('content')
<section class="food_list">
  <a href="/food//view" class="card">
    <div class="img"></div>
    <div class="caption">
      <h4 class="title" style="font-size: var(--font-medium);">Nasi Goreng</h4>
      <p class="description">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Magnam perferendis asperiores laudantium deleniti nam explicabo adipisci consequuntur perspiciatis quaerat ex odit ab suscipit, inventore sed minima amet reiciendis, esse quasi totam autem?
      </p>
      <h6 class="price" style="font-size: var(--font-small);">IDR. 12.000,-</h6>
    </div>
  </a>
</section>
@endsection