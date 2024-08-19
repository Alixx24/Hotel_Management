@extends('home.layouts.master-one-col')


@section('content')
<div class="p-3 mb-2 bg-secondary text-white ">
 

    <div class="max-w-7xl mx-auto p-6 lg:p-8">

        @foreach ($fetchHotel as $item)
        <div class="card bg-dark container mt-4" style="width: 18rem;">
            <div class="row">
            <div class="col-6 mb-2">
                <img class="card-img-top" src="..." alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->name }}</h5>
                    <p class="card-text">Star {{ $item->star }}</p>
                    <p class="card-text">{{ $item->region}} - {{
                        $item->country}}</p>
                </div>
            </div>
            <div class="card-body">
                <a href="{{ url('hotel_details', $item->id) }}" class="btn btn-success">See For Booking</a>
            </div>
            </div>
        </div>



        @endforeach

       

        <div class="flex justify-center mt-16 px-0 sm:items-center sm:justify-between">
            <div class="text-center text-sm sm:text-left">
                &nbsp;
            </div>

            <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
                Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </div>
        </div>
    </div>
</div>
@endsection