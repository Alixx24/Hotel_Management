@extends('home.layouts.master-one-col')


@section('content')



<div class="card">

    <section class="order-wrapper">

        <form method="POST" >
            @csrf

            <section class="justify-center card-columns card text-white bg-primary mb-3" style="max-width: 58rem;">

                <section class="mb-3 col">
                    <div class="form-group">
                        <label for="" class="card-header text-center">موضوع</label>
                        <select name="subject" id="" class="form-control form-control-sm card-body">
                            <option value="">موضوع را انتخاب کنید</option>
                            @foreach($fetchTicketCats as $data)
                            <option value="{{ $data->id }}">{{ $data->name }}
                            </option>
                            @endforeach

                        </select>
                    </div>
                    @error('priority_id')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </section>
                <section class="col-12">
                    <div class="form-group">
                        <label for="" class="my-2">متن</label>
                        ‍<textarea class="form-control form-control-sm" rows="4"
                            name="description">{{ old('description') }}</textarea>
                    </div>
                    @error('description')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </section>

                <section class="col-12 my-2">
                    <div class="form-group">
                        <label for="file">فایل</label>
                        <input type="file" class="form-control form-control-sm" name="file" id="file">
                    </div>
                    @error('file')
                    <span class="alert_required bg-danger text-white p-1 rounded" role="alert">
                        <strong>
                            {{ $message }}
                        </strong>
                    </span>
                    @enderror
                </section>
                <section class="col text-center">
                    <button class="btn btn-warning btn-sm">ارسال</button>
                </section>
            </section>
        </form>

    </section>

</div>
</div>



@endsection