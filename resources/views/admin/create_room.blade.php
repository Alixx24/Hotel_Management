<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  
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

                    <h3>Add room</h3>

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


        <form action="{{ url('add_room') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="form-group">
                    <label for="">Room Title</label>
                    <input class="form-control" type="text" name="title">
                </div>

                    <div class="form-group">
                        <label for="">تاریخ انتشار</label>
                        <input type="text" name="published_at" id="published_at" class="form-control form-control-sm d-none">
                        <input type="text" id="published_at_view" class="form-control form-control-sm">
                    </div>
                    @error('published_at')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                @enderror
             
                <div class="form-group"> 
                    <label for="description">description</label>
                    <textarea class="form-control" name="description" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group"> 
                    <label for="essential_tips">Essential Tips</label>
                    <textarea class="form-control" name="essential_tips" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group"> 
                    <label for="about_hotel">About the hotel</label>
                    <textarea class="form-control" name="about_hotel" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    <label for="">Price</label>
                    <input type="number" name="price">
                </div>
                <p> امکانات رفاهی و تفریحی هتل</p>

                <div class="form-group">
                    <label for="Room Type">Room Type</label>
                    <select name="room_type" id="">
                        <option selected value="reqular">reqgular</option>
                        <option value="premium">premium</option>
                        <option value="deluxe">Deluxe</option>

                    </select>
                </div>

                <div class="form-group">
                    <label for="wifi">Wifi</label>
                    <select name="wifi" id="">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

                </div>

                <div class="form-group">
                    <label for="Simming Pool">Swimming pool</label>
                    <select name="swimming_pool" id="swimming_pool">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

                </div>


                <div class="form-group">
                    <label for="gym">Gym</label>
                    <select name="gym" id="gym">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

                </div>
                
                <div class="form-group">
                    <label for="turkish_bath">Turkish bath</label>
                    <select name="turkish_bath" id="turkish_bath">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="parking">Parking</label>
                    <select name="parking" id="">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

                </div>

                <div class="form-group">
                    <label for="breakfast">Breakfast</label>
                    <select name="breakfast" id="">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

                </div>
                <div class="form-group">
                    <label for="lunch">Lunch</label>
                    <select name="lunch" id="">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

                </div>
                <div class="form-group">
                    <label for="dinner">Dinner</label>
                    <select name="dinner" id="">
                        <option selected value="yes">yes</option>
                        <option value="no">no</option>

                    </select>

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

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="{{ asset('admin-assets/jalalidatepicker/persian-date.min.js') }}"></script>
    <script src="{{ asset('admin-assets/jalalidatepicker/persian-datepicker.min.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('#published_at_view').persianDatepicker({
                format: 'YYYY/MM/DD',
                altField: '#published_at'
            })
        });
    </script>
</body>

</html>