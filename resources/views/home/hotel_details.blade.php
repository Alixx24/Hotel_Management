@extends('home.layouts.master-one-col')


@section('content')
@foreach($fetchHotel as $data)
@endforeach


<div class="card text-center">
    <div class="card-header">
      Featured
    </div>
    <div class="card-body">
      <h5 class="card-title">Name: {{ $fetchHotel->name }}</h5>
      <p class="card-text">Number Rooms: {{ $fetchHotel->number_rooms}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    <div class="card-footer text-muted">
      2 days ago
    </div>
  </div>


@endsection