@extends('base')

@section('title', 'Car')
@section('description', 'Car')

@section('content')

    <h1>{{ $car->name }}</h1>

    <table class="table">
        <tr>
            <th>Is registered</th>
            <td>{{ $car->is_registered }}</td>
        </tr>
        <tr>
            <th>Registration number</th>
            <td>{{ $car->registration_number }}</td>
        </tr>
        <tr>
            <th>Creation date</th>
            <td>{{ $car->created_at->isoFormat('D.M.Y HH:mm') }}</td>
        </tr>
        <tr>
            <th>Date of the last change</th>
            <td>{{ $car->updated_at->isoFormat('D.M.Y HH:mm') }}</td>
        </tr>
    </table>

@endsection



