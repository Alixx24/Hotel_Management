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

                    <a href="{{ url('create_room') }}">Add Room</a>
                    <a href="{{ url('view_room') }}">View Room</a>
                    <a href="">Add Room</a>

                    <h3>Update room</h3>

                </div>
            </div>
        </div>


        <form action="{{ url('edit_room',$fetchRoom->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-group">
                    <label for="">Room Title</label>
                    <input class="form-control" type="text" name="title" value="{{ $fetchRoom->room_title }}">
                </div>
                <div class="form-group">
                    <label for="description">description</label>
                    <textarea class="form-control" name="description" id="" cols="30"
                        rows="10">{{ $fetchRoom->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price" value={{ $fetchRoom->price }}>
                </div>
                <div class="form-group">
                    <label for="Room Type"></label>
                    <select name="room_type" id="">
                        <option selected value="{{ $fetchRoom->room_type }}">{{ $fetchRoom->room_type }}</option>
                        <option value="premium">premium</option>
                        <option value="deluxe">Deluxe</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="wifi"></label>
                    <select name="wifi" id="">
                        <option value="yes" selected>{{ $fetchRoom->wifi }}</option>
                        <option value="no">no</option>

                    </select>

                </div>

                <div class="form-group">
                    <label for="">Current image: {{ $fetchRoom->image }}</label>
                    <img src="/room/{{ $fetchRoom->image }}" width="100" alt="">
                </div>
                <div class="form-group">
                    <label for="">Upload image</label>
                    <input type="file" name="image">
                </div>
                <div>

                    <button class="btn btn-primary" type="submit">Add Room</button>
                </div>
            </div>

        </form>

    </x-app-layout>
</body>

</html>