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
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <h3>Update Hotel</h3>

                </div>
            </div>
        </div>
        <div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-bs-dismiss="alert">X</button>
                {{ session()->get('message') }}
            </div>
            @endif
        </div>

        <form action="{{ url('/hotel/update/'.$fetchHotel[0]->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-group">
                    <label for="">Room Title</label>
                    <input class="form-control" type="text" name="title" value="{{ $fetchHotel[0]->name }}">
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" value={{ $fetchHotel[0]->number_rooms }}>
                </div>
               
               
                
                    <button class="btn btn-primary" type="submit">Update Your Info</button>
                </div>
            </div>

        </form>

    </x-app-layout>
</body>

</html>