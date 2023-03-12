@extends('base')

@section('title', 'Part')
@section('description', 'Part')

@section('content')

    <h1>{{ $part->name }}</h1>

    <table class="table">
        <tr>
            <th>Serial Number</th>
            <td>{{ $part->serial_number }}</td>
        </tr>
        <tr>
            <th>Car Id</th>
            <td><a href="{{ route('car.show', ['car' => $part->car_id]) }}">{{ $part->car->name }}</a></td>
        </tr>
        <tr>
            <th>Creation date</th>
            <td>{{ $part->created_at->isoFormat('D.M.Y HH:mm') }}</td>
        </tr>
        <tr>
            <th>Date of the last change</th>
            <td>{{ $part->updated_at->isoFormat('D.M.Y HH:mm') }}</td>
        </tr>
    </table>

@endsection
