@extends('base')

@section('title', 'Edit Part ->' . $part->name)
@section('description', 'Editor for creating a Part')

@section('content')

    <h1>Edit Part -> <strong class="">{{ $part->name }}</strong></h1>

    <form action="{{ route('part.update' , ['part' => $part]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?: $part->name }}" required />

        <label for="serial_number">Serial number</label>
        <input type="text" name="serial_number" id="serial_number" class="form-control" value="{{ old('serial_number')  ?: $part->serial_number }}" required />

        <label for="car_id">Car</label>
        <select class="form-select" name="car_id" id="car_id" required>
            @foreach ($cars as $car)
                <option {{ old('car_id') === $car->id || $car->id === $part->car_id  ? 'selected' : '' }} value="{{ $car->id }}">{{ $car->name }}</option>
            @endforeach
        </select>

        <button type="submit" class="mt-1 btn btn-success">Save part</button>
    </form>

@endsection
