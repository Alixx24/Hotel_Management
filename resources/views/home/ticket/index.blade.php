@extends('home.layouts.master-one-col')


@section('content')



<div class="card text-center">
    <div class="card-header">
        Subject
    </div>

   
    <form method="POST">
        @csrf
      

        <select name="guarantee" id="guarantee" class="p-1">
             @foreach($fetchTicketCats as $data)
            <option value="{{ $data->id }}">{{ $data->name }}
            </option>
            @endforeach

        </select>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Example textarea</label>
            <textarea class="form-control" name="commentBody" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">

                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
 


</div>
</div>



@endsection