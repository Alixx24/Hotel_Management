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

        @if(Auth::user())
        <div class="bi bi-flag" x-data="{ isOpen: false}">
            <button @click="isOpen = !isOpen" @keydown.escape="isOpen = false" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="36" height="26" fill="currentColor" class="bi bi-flag"
                    viewBox="0 0 16 16">
                    <path
                        d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12 12 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A20 20 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a20 20 0 0 0 1.349-.476l.019-.007.004-.002h.001M14 1.221c-.22.078-.48.167-.766.255-.81.252-1.872.523-2.734.523-.886 0-1.592-.286-2.203-.534l-.008-.003C7.662 1.21 7.139 1 6.5 1c-.669 0-1.606.229-2.415.478A21 21 0 0 0 3 1.845v6.433c.22-.078.48-.167.766-.255C4.576 7.77 5.638 7.5 6.5 7.5c.847 0 1.548.28 2.158.525l.028.01C9.32 8.29 9.86 8.5 10.5 8.5c.668 0 1.606-.229 2.415-.478A21 21 0 0 0 14 7.655V1.222z" />
                </svg>

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
        @endif
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





                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">

                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </div>
            </div>
            </div>

        </form>

    </x-app-layout>
</body>

</html>