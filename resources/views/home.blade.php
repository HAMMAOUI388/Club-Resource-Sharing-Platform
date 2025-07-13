<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Industry 4.0</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    {{-- Vite-built CSS & JS --}}
    @vite(['resources/js/app.js'])

    {{-- Raw CSS files --}}
    <link rel="stylesheet" href="{{ asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
    <link rel="stylesheet" href="{{ asset('css/ressources.css') }}">
    <link rel="stylesheet" href="{{ asset('slider/style.css') }}">
</head>

<body>
    @include('navbar')
    @include('slider')
    @include('presentation')
    @include('event')
    @include('post')
    @include('ressources')

    <footer id="contact">
        @include('partials.footer')
    </footer>
</body>
</html>
