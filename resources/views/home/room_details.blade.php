<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Book Room') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <a href="{{ url('create_room') }}">Add Room</a>
                    <a href="{{ url('view_room') }}">View Room</a>
                    <a href="">Add Room</a>

                   

                </div>
            </div>
        </div>


        <form action="{{ url('add_booking') }}" method="post">
            @csrf
            <div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" id="email"></input>
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone">
                </div>

                <div>
                    <label for="">start date</label>
                    <input type="date" name="startDate" id="startDate">
                </div>

                <div>
                    <label for="">end date</label>
                    <input type="date" name="endDate" id="endDate">
                </div>







                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            </div>

        </form>

    </x-app-layout>
</body>

</html>