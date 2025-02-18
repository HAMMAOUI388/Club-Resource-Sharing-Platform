<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Industry 4.0</title>
    <link rel="stylesheet" href="{{ asset('slider/event.css') }}">
</head>
<body>
    <div class="container">
        <h1 class="section-title">Upcoming Events</h1>

        @if(isset($events) && $events->isNotEmpty())
            <div class="events-grid">
                @foreach($events as $event)
                    <div class="event-card">
                        @if(file_exists(public_path('storage/images/' . $event->photo)))
                            <a href="{{ route('events.show', $event->id) }}" class="event-link">
                                <div class="event-img-container">
                                    <img src="{{ asset('storage/images/' . $event->photo) }}" alt="{{ $event->title }}" class="event-img">
                                    <div class="event-info">
                                        <h3>{{ $event->title }}</h3>
                                        <p>{{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
                                        <p class="event-description">{{ $event->description }}</p>
                                        <form action="{{ route('events.register', $event->id) }}" method="POST" class="register-form">
                                            @csrf
                                            <button type="submit" class="register-btn">REGISTER TO EVENT</button>
                                        </form>
                                    </div>
                                </div>
                            </a>
                        @else
                            <p>Image not found: {{ 'storage/images/' . $event->photo }}</p>
                        @endif
                    </div>
                @endforeach
            </div>
        @else
            <p class="no-events">No upcoming events at the moment.</p>
        @endif
    </div>

    <div id="calendar"></div>

    <!-- FullCalendar.js -->
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            events: {!! json_encode($events->map(function($event) {
                return [
                    'title' => $event->title,
                    'start' => $event->date,
                    'url' => route('events.show', $event->id),
                ];
            })) !!}
        });
        calendar.render();
    });
    </script>
</body>
</html>
