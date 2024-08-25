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



        <div class="contentAcoording">
            <h2>Travel more, spend less</h2>
            <div class="accordion">

                <div class="accordion-item">
                    <button class="accordion-button bg-dark text-light" onclick="toggleAccordion(this)">
                        <h5>Damage payments</h5>
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="accordion-content">
                        <p>
                            Most guests respect the properties they stay at. According to our statistics, damage by
                            guests is very rare—occurring only once for every 5,000 bookings—and most of those incidents
                            are accidental rather than intentional.</p>
                    </div>
                </div>
            </div>
            <div class="accordion">
                <div class="accordion-item">
                    <button class="accordion-button bg-dark text-light" onclick="toggleAccordion(this)">
                        <h5>Choose how you prefer to receive bookings</h5>
                        <i class="fa fa-plus"></i>
                    </button>
                    <div class="accordion-content">
                        <p>
                            Request to Book is a feature that offers you full control to manage booking requests. Unlike
                            Instant Booking where guests can book a property directly, Request to Book requires guests
                            to send a booking request that you can accept or decline.
                    </div>
                </div>
            </div>
        </div>

    </div>
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
@section('script')
<script>
    function toggleAccordion(button) {
const content = button.nextElementSibling;
        const icon = button.querySelector('i');
        
        if (content.classList.contains('show')) {
            content.classList.remove('show');
            icon.classList.remove('fa-minus');
            icon.classList.add('fa-plus');
        } else {
            document.querySelectorAll('.accordion-content').forEach(el => {
                el.classList.remove('show');
            });
            document.querySelectorAll('.accordion-button i').forEach(el => {
                el.classList.remove('fa-minus');
                el.classList.add('fa-plus');
            });
            content.classList.add('show');
            icon.classList.remove('fa-plus');
            icon.classList.add('fa-minus');
        }
    }
</script>
@endsection