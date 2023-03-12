<!DOCTYPE html>
<html lang="cs-CZ">
<head>

    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="@yield('description')" />
    <title>@yield('title', env('APP_NAME'))</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet" />

    <script src="{{ asset('js/app.js') }}"></script>

    <script src="{{ asset('js/is_registered.js') }}"></script>

</head>
<body class="container">
<div class="d-flex justify-content-between p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">

    <a class="navbar-brand  d-flex" href="{{ url('') }}">
        <hgroup class="font-italic">
            <h1 class="font-monospace text-black-50 ">{{ env('APP_NAME') }}</h1>
            <h4 class="text-end text-success text-monospace">{{ env('APP_PROJECT') }}</h4>
        </hgroup>
    </a>

    <div>
        <nav class="my-2 my-md-0 mr-md-3">
            <a class="p-2 text-dark" href="{{ route('car.index') }}">Cars list</a>
            <a class="p-2 text-dark" href="{{ route('part.index') }}">Parts list</a>
        </nav>
    </div>

</div>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger mb-4">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="d-flex justify-content-center">
        <div>
            @yield('content')
        </div>
    </div>

    <hr>
    <address class="text-center text-monospace p-2">
        <div>
                <span>
                    Copyright © 2023<a href="#" class="text-decoration-none text-dark">|{{env('APP_NAME')}}|</a>
                </span>
        </div>
        <div class="small text-muted pt-2">
            <span>Created #MiCHo# | for {{env('APP_PROJECT')}}| </span>
        </div>
    </address>
</div>

@stack('scripts')
</body>
</html>
