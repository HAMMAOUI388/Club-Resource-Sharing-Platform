<x-app-layout>
    <div class="container">
        <h2>{{ $event->title }}</h2>
        <p class="date"><strong>Date:</strong> {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }}</p>
        <p>{{ $event->description }}</p>

        @auth
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <a href="{{ route('events.register.form', $event->id) }}" class="btn btn-primary">Register for this Event</a>
        @else
            <p>Please <a href="{{ route('login') }}">login</a> to register for this event.</p>
        @endauth
    </div>
</x-app-layout>
