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
  <div>
    @auth
    <form action="{{ url('/hotel_details/'.$fetchHotel->id.'/comment') }}" method="POST">
      @csrf

      <div class="form-group">
        <label for="exampleFormControlTextarea1">Example textarea</label>
        <textarea class="form-control" name="commentBody" id="exampleFormControlTextarea1" rows="3"></textarea>
      </div>
  
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </div>
    </form>
    @endauth
<div>
  
    
    @foreach ($fetchThisComments as $object)
  {{ $object->user->name }}</br>{{ $object->body }} (date: {{$object->created_at }})<hr>
@endforeach</p>
</div>
    @guest
    <div class="form-group">
      <label for="comment">Your Email</label>
      <input type="email" class="form-control" name="email" required id="email"></input>
    </div>
    <div class="form-group">
      <label for="comment">Your Comment</label>
      <input type="email" class="form-control" name="email" required id="email"></input>
    </div>
    @endguest
  </div>
</div>



@endsection