@extends('base')

@section('title', 'Edit Car ->' . $car->name)
@section('description', 'Editor for creating a Car')

@section('content')

    <h1>Edit Car -> <strong class="">{{ $car->name }}</strong></h1>

    <form action="{{ route('car.update' , ['car' => $car]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?: $car->name }}" required />

        <div class="form-check m-2">
            <label for="is_registered">
                <input type="checkbox" name="is_registered" id="is_registered" value="1" {{ old('is_registered') || $car->is_registered === 1  ? 'checked' : ''}} />
                Is registered
            </label>
        </div>

        <div id="registration_number_div">
            <label for="registration_number">Registration Number</label>
            <input type="text" name="registration_number" id="registration_number" class="form-control"  value="{{ old('registration_number')  ?: $car->registration_number }}" />
        </div>

        <button type="submit" class="mt-1 btn btn-success">Save Car</button>
    </form>

@endsection
