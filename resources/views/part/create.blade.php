@extends('base')

@section('title', 'Create Part')
@section('description', 'Editor for creating a new Part')

@section('content')

    <h1>Create Part</h1>

    <form action="{{ route('part.store') }}" method="POST">
        @csrf

        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required />

        <label for="serial_number">Serial number</label>
        <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ old('serial_number') }}" required />

        <label for="car_id">Car</label>
        <select class="form-select" name="car_id" id="car_id" required>
            @foreach ($cars as $car)
                <option {{ old('car_id') === $car->id ? 'selected' : '' }} value="{{ $car->id }}">{{ $car->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="mt-1 btn btn-success">Create part</button>
    </form>
@endsection
