<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Industry 4.0</title>
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">


</head>
<body>
        @include('navbar')
        @include('slider')
        @include('presentation')
        @include('event')
        @include('forum')
        @include('footer')
        <script src="{{ asset('slider/app.js') }}"></script>
</body>
</html>
