<x-app-layout>
    <div class="container">
        <h2>S'inscrire à l'événement : {{ $event->title }}</h2>
        <form action="{{ route('events.register', $event->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="name" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Email :</label>
                <input type="email" name="email" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
</x-app-layout>
