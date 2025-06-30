<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>@yield('title', config('app.name', 'Industry 4.0'))</title>

    <!-- Fonts and Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Your custom styles here */
    </style>
</head>
<body>
    <div class="min-h-screen">
        @include('layouts.navigation')

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
