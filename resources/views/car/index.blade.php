@extends('base')

@section('title', 'List of cars')
@section('description', 'List of cars.')

@section('content')

    <h1 class="text-center">List of cars</h1>

    <hr/>
    <div class="d-flex justify-content-center">
        <form method="GET">

            <div class="d-flex">

                <div>
                    <label for="isRegisteredFilter">Is registered</label>
                    <select class="form-select" name="isRegisteredFilter" id="isRegisteredFilter" onchange="this.form.submit()">
                        @foreach ($isRegisteredFilters as $key => $filter)
                            <option {{ $activFilter['isRegisteredFilter'] == $filter ? 'selected' : '' }} value="{{ $filter }}">{{ $key }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
        </form>
    </div>
    <hr/>

    <table class="table table-hover table-bordered table-responsive-md">
        <thead>
        <tr>
            <th>Name</th>
            <th>Is registered</th>
            <th>Registration number</th>
            <th>Parts</th>
            <th>Creation date</th>
            <th>Date of the last change</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($cars as $car)
            <tr>
                <td>
                    <a href="{{ route('car.show', ['car' => $car]) }}">
                        {{ $car->name }}
                    </a>
                </td>
                <td>{{ $car->is_registered ? 'Yes' : 'No' }}</td>
                <td>{{ $car->registration_number }}</td>
                <td>
                    <a href="{{ route('part.index', ['carFilter='.$car->id]) }}">
                        Parts
                    </a>
                </td>
                <td>{{ $car->created_at->isoFormat('D.M.Y HH:mm') }}</td>
                <td>{{ $car->updated_at->isoFormat('D.M.Y HH:mm') }}</td>
                <td>
                    <a href="{{ route('car.edit', ['car' => $car]) }}">Edit</a>

                    <a href="#" onclick="event.preventDefault(); $('#car-delete-{{ $car->id }}').submit();">Delete</a>
                    <form action="{{ route('car.destroy', ['car' => $car]) }}" method="POST"
                          id="car-delete-{{ $car->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="text-center">
                    The list is empty
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    <a href="{{ route('car.create') }}" class="btn btn-primary">
        Add a new car
    </a>

@endsection


