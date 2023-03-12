@extends('base')

@section('title', 'Creat Car')
@section('description', 'Editor for creating a new Car')

@section('content')

    <h1>Creat Car</h1>

    <form action="{{ route('car.store') }}" method="POST">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required />

        <div class="form-check m-2">
            <label for="is_registered">
                <input type="checkbox" name="is_registered" id="is_registered" value="1" {{ old('is_registered') ? 'checked' : ''}} />
                Is registered
            </label>
        </div>

        <div id="registration_number_div">
            <label for="registration_number">Registration Number</label>
            <input type="text" name="registration_number" id="registration_number" class="form-control" value="{{ old('registration_number') }}" />
        </div>

        <button type="submit" class="mt-1 btn btn-success">Create car</button>
    </form>

@endsection



