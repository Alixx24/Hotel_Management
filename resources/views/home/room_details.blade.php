<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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




                    
            
                    <a href="{{ url('view_room') }}">View Room</a>

                </div>
            </div>
        </div>
        <div class="relative" x-data="{ isOpen: false}">
            <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" class="flex items-center">
                <img src="http://www.gravatar.com/avatar?d=mm" alt="avatar" class="w-8 h-8 rounded-full">
                <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                    <path d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"
                        class="heroicon-ui"></path>
                </svg>
            </button>
            <ul x-show="isOpen" @click.away="isOpen = false"
                class="absolute font-normal bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 right-0 z-20">
                @foreach($fetchViolations as $violation )
                
                    <a href="{{ url('/room_details/'.$fetchRoom->id.'/hotel_violation',$violation->id) }}"
                        class="flex items-center px-3 py-3 hover:bg-gray-200">
                        <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24"
                            height="24" class="text-gray-600">
                            <path
                                d="M12 12a5 5 0 1 1 0-10 5 5 0 0 1 0 10zm0-2a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm9 11a1 1 0 0 1-2 0v-2a3 3 0 0 0-3-3H8a3 3 0 0 0-3 3v2a1 1 0 0 1-2 0v-2a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v2z"
                                class="heroicon-ui"></path>
                        </svg>
                        <span class="ml-2">{{ $violation->violation }}</span>
                    </a>
                </li>
                @endforeach

            </ul>
        </div>
        <h1>{{ $fetchRoom->room_title }}</h1>
        price:<h1>{{ $fetchRoom->price }}</h1>

        <div>
            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-bs-dismiss="alert">X</button>
                {{ session()->get('message') }}
            </div>
            @endif
        </div>


        @if($errors)
        @foreach ($errors->all() as $errors)
        <li class="text-danger">
            {{$errors}}
        </li>
        @endforeach
        @endif
        <form action="{{ url('add_booking', $fetchRoom->id) }}" method="post">
            @csrf
            <div>
                <div class="form-group">
                    <label for="">Name</label>
                    <input class="form-control" type="text" name="name" required @if(Auth::id())
                        value="{{ Auth::user()->name }}" @endif>
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" class="form-control" name="email" required id="email" @if(Auth::id())
                        value="{{ Auth::user()->email }}" @endif></input>
                </div>

                <div class="form-group">
                    <label for="">Phone</label>
                    <input type="number" name="phone" required @if(Auth::id()) value="{{ Auth::user()->phone }}" @endif>
                </div>

                <div>
                    <label for="">start date</label>
                    <input type="date" name="start_date" id="start_date" required>
                </div>

                <div>
                    <label for="">end date</label>
                    <input type="date" name="end_date" id="end_date" required>
                </div>







                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            </div>

        </form>

    </x-app-layout>
</body>

</html>