@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>All Posts</h1>

        @foreach ($posts as $post)
            <div class="card mb-3">
                <div class="card-body">
                    <h3><a href="{{ route('posts.show', $post->slug) }}">{{ $post->title }}</a></h3>
                    <p>{{ Str::limit($post->body, 150) }}</p>
                    <p><small>By {{ $post->user->name ?? 'Unknown' }}</small></p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
