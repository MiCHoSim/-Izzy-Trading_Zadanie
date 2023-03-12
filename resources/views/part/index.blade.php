@extends('base')

@section('title', 'Parts list')
@section('description', 'Parts list.')

@section('content')

    <h1 class="text-center">Parts list</h1>

    <hr/>
    <div class="d-flex justify-content-center">
        <form method="GET">

            <div class="d-flex">

                <div>
                    <label for="carFilter">Name Filter</label>
                    <select class="form-select" name="carFilter" id="carFilter" onchange="this.form.submit()">
                        @foreach ($carFilters as $key => $filter)
                            <option {{ $activFilter['carFilter'] == $filter ? 'selected' : '' }} value="{{ $filter }}">{{ $key }}</option>
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
            <th>Serial Number</th>
            <th>Car</th>
            <th>Creation date</th>
            <th>Date of the last change</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($parts as $part)
            <tr>
                <td>
                    <a href="{{ route('part.show', ['part' => $part]) }}">
                        {{ $part->name }}
                    </a>
                </td>
                <td>{{ $part->serial_number }}</td>
                <td><a href="{{ route('car.show', ['car' => $part->car]) }}">{{ $part->car->name }}</a></td>
                <td>{{ $part->created_at->isoFormat('D.M.Y HH:mm') }}</td>
                <td>{{ $part->updated_at->isoFormat('D.M.Y HH:mm') }}</td>
                <td>
                    <a href="{{ route('part.edit', ['part' => $part]) }}">Edit</a>

                    <a href="#" onclick="event.preventDefault(); $('#part-delete-{{ $part->id }}').submit();">Delete</a>
                    <form action="{{ route('part.destroy', ['part' => $part]) }}" method="POST"
                          id="part-delete-{{ $part->id }}" >
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

    <a href="{{ route('part.create') }}" class="btn btn-primary">
        Add a new part
    </a>

@endsection


