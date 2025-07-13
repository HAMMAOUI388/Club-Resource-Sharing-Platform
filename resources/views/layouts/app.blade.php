<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

<title>@stack('title', config('app.name', 'Industry 4.0'))</title>

    <!-- Fonts and Styles -->
    <link rel="stylesheet" href="{{ asset('css/ressources.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    @vite([ 'resources/js/app.js'])

    <style>
        body {
            background-color: #000;
            color: #eee;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            margin: 0;
        }

        a {
            text-decoration: none;
            color: #f1683a;
        }

        .container {
            max-width: 900px;
            margin: auto;
            padding: 2rem;
        }

        h2 {
            font-size: 2rem;
            color: #f1683a;
            margin-bottom: 1rem;
        }

        .btn-primary {
            background-color: #f1683a;
            color: white;
            padding: 0.6rem 1.2rem;
            border: none;
            font-weight: 600;
            cursor: pointer;
            border-radius: 6px;
        }

        .btn-primary:hover {
            background-color: #d75c2f;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            margin-bottom: 1rem;
            border: none;
            border-radius: 5px;
        }

        label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
        }

        .alert-success {
            background-color: #28a745;
            padding: 0.75rem;
            color: white;
            margin-bottom: 1rem;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="min-h-screen">
        @include('layouts.navigation')

        <main>
            {{ $slot }}
        </main>

    </div>
</body>
</html>
