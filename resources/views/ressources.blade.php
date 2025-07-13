<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training Resources</title>
    <link rel="stylesheet" href="{{ asset('css/ressources.css') }}">
        @vite(['resources/js/app.js']) <!-- This loads both JS and CSS from Vite -->

</head>
<body>
    <h2>Training Resources</h2>

    <div class="ressources-section">

        {{-- Message for guests --}}
        @guest
            <p style="color: red; font-weight: bold;">
                Do you want to share your resources with the next generation? <br>
                <a href="{{ route('register') }}">Register here</a> to upload and download files.
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
            <input type="text" name="title" placeholder="File title" required>
            <select name="field" required>
                <option value="" disabled selected>Field (e.g., TDI)</option>
                <option value="TDI">TDI</option>
                <option value="IACS">IACS</option>
                <option value="ER">ER</option>
                <option value="AA">AA</option>
            </select>
            <input type="text" name="module" placeholder="Module (e.g., Electronics)" required>
            <input type="file" name="file" required>
            <button type="submit" class="btn btn-primary">UPLOAD</button>
        </form>
        @endauth

        {{-- Search Form --}}
        <form method="GET" action="{{ route('resources.index') }}">
            <input type="text" name="field" placeholder="Field">
            <input type="text" name="module" placeholder="Module">
            <button type="submit" class="btn btn-secondary">SEARCH</button>
        </form>

        {{-- Resource List --}}
        @isset($resources)
            @if($resources->isEmpty())
                <p>No resources available.</p>
            @else
                @foreach($resources as $resource)
                    <div class="resource-card">
                        <h5>{{ $resource->title }}</h5>
                        <p><strong>Module:</strong> {{ $resource->module }} | 
                            <strong>Field:</strong> {{ $resource->field }}</p>
                        @auth
                            <a href="{{ Storage::url($resource->file_path) }}" class="btn btn-success" target="_blank">DOWNLOAD</a>
                        @else
                            <p style="color: gray;">Please log in to download this resource.</p>
                        @endauth
                    </div>
                @endforeach
            @endif
        @endisset

    </div>
    <div class="see-more-wrapper">
        <a href="{{ route('resources.index') }}" class="see-more-btn">SEE MORE</a>
    </div>

</body>
</html>
