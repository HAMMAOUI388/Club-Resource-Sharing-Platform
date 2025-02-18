<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $event->title }}</title>
    <link rel="stylesheet" href="{{ asset('slider/event.css') }}">
</head>
<body>

<div class="container">
    <h2>{{ $event->title }}</h2>
    <p class="date"><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
    <p>{{ $event->description }}</p>
</div>

</body>
</html>
