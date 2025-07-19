<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Industry 4.0</title>
    <link rel="icon" href="{{ secure_asset('favicon.ico') }}" type="image/x-icon">

    {{-- Vite-built CSS & JS --}}

    {{-- Raw CSS files --}}
    <link rel="stylesheet" href="{{ secure_asset('css/event.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/post.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('css/ressources.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('slider/style.css') }}">
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
