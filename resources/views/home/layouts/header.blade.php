<!-- start header -->

<header class="header mb-4">

    <!-- start top-header logo, searchbox and cart -->
    <head>
        <title>Bootstrap Example</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <style>
          /* Remove the navbar's default margin-bottom and rounded borders */ 
          .navbar {
            margin-bottom: 0;
            border-radius: 0;
          }
          
          /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
          .row.content {height: 450px}
          
          /* Set gray background color and 100% height */
          .sidenav {
            padding-top: 20px;
            background-color: #f1f1f1;
            height: 100%;
          }
          
          /* Set black background color, white text and some padding */
          footer {
            background-color: #555;
            color: white;
            padding: 15px;
          }
          
          /* On small screens, set height to 'auto' for sidenav and grid */
          @media screen and (max-width: 767px) {
            .sidenav {
              height: auto;
              padding: 15px;
            }
            .row.content {height:auto;} 
          }
        </style>
        <footer class="container-fluid text-center bg-dark">
            @if (Route::has('login'))
            <div class="card-body">
                @auth
                <a href="{{ url('/dashboard') }}"
                    class="text-light">home</a>
                @else
                {{-- <a class="btn btn-danger" href="{{ route('home.user.ticket') }}">Ticket</a> --}}
                <a class="btn btn-light" href="{{ route('hotel.agent.login.view') }}">Agent Login</a>
                <a class="btn btn-success" href="{{ route('hotel.agent.register.view') }}"
                    class="text-light">  Agent Register</a>
                <hr>
                <a class="btn btn-light" href="{{ route('login') }}"
                    class="text-light">Log
                    in</a>
        
                @if (Route::has('register'))
                <a class="btn btn-success" href="{{ route('register') }}"
                    class="text-light">Register</a>
                @endif
                @endauth
            </div>
            @endif
          </footer>
      </head>