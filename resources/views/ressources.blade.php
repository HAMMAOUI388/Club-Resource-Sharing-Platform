<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ressources de Formation</title>
    <link rel="stylesheet" href="{{ asset('css/ressources.css') }}">
</head>
<body>
    <div class="ressources-section">
        <h2>📚 Ressources de Formation</h2>

        {{-- Message for guests --}}
        @guest
            <p style="color: red; font-weight: bold;">
                Vous souhaitez partager vos ressources pour la nouvelle génération ? <br>
                <a href="{{ route('register') }}">Inscrivez-vous ici</a> pour pouvoir téléverser et télécharger des fichiers.
            </p>
        @endguest

        {{-- Success Message --}}
        @if(session('success'))
            <div style="color: green; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        {{-- Error Messages --}}
        @if ($errors->any())
            <div style="color: red;">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Upload Form - Only for authenticated users --}}
        @auth
        <form method="POST" action="{{ route('resources.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" name="title" placeholder="Titre du fichier" required>
            <input type="text" name="field" placeholder="Filière (ex: TDI)" required>
            <input type="text" name="module" placeholder="Module (ex: Électronique)" required>
            <input type="file" name="file" required>
            <button type="submit" class="btn btn-primary">Uploader</button>
        </form>
        @endauth

        {{-- Search Form --}}
        <form method="GET" action="{{ route('resources.index') }}">
            <input type="text" name="field" placeholder="Filière">
            <input type="text" name="module" placeholder="Module">
            <button type="submit" class="btn btn-secondary">Rechercher</button>
        </form>

        {{-- Resource List --}}
        @isset($resources)
            @if($resources->isEmpty())
                <p>Aucune ressource disponible.</p>
            @else
                @foreach($resources as $resource)
                    <div class="resource-card">
                        <h5>{{ $resource->title }}</h5>
                        <p><strong>Module:</strong> {{ $resource->module }} | 
                           <strong>Filière:</strong> {{ $resource->field }}</p>
                        @auth
                            <a href="{{ Storage::url($resource->file_path) }}" class="btn btn-success" target="_blank">📥 Télécharger</a>
                        @else
                            <p style="color: gray;">Connectez-vous pour télécharger cette ressource.</p>
                        @endauth
                    </div>
                @endforeach
            @endif
        @endisset

    </div>
</body>
</html>
