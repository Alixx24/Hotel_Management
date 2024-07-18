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
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($fetchRooms as $item)

      <tr>
        <th scope="row">1</th>
        <td>{{ $item->room_title }}</td>
        <td>{{ $item->price }}$</td>
        <td>{{ $item->room_type }}</td>
        <td><a onclick="return confirm('Are you sure to delete this ')" href="{{ url('delete_room', $item->id) }}">Delete</a></td>
        <td><a href="{{ url('update_room', $item->id) }}">َUpdate</a></td>

        <td>
          <img width="60" src="room/{{ $item->image }}" alt="">
        </td>
        
      </tr>
      @endforeach
    </tbody>
  </table>
</body>

</html>