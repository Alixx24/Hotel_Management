<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                    <a href="">Add Room</a>
                    <a href="">Add Room</a>

                    <h3>Add room</h3>

                </div>
            </div>
        </div>


        <form action="{{ url('add_room') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div>
                    <label for="">Room Title</label>
                    <input type="text" name="title">
                </div>
                <div>
                    <label for="description">description</label>
                    <textarea name="description" id="" cols="30" rows="10"></textarea>
                </div>

                <div>
                    <label for="">Price</label>
                    <input type="number" name="price">
                </div>
                <div>
                    <label for="Room Type"></label>
                    <select name="room_type" id="">
                        <option selected value="reqular">reqgular</option>
                        <option value="premium">premium</option>
                        <option value="deluxe">Deluxe</option>

                    </select>
                </div>

                <div>
                    <label for="wifi"></label>
                    <select name="wifi" id="">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

                </div>

                <div>
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