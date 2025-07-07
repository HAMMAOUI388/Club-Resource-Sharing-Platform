@extends('layouts.classic-app')

@section('title', 'Community | Industry 4.0')

@section('content')



<link rel="stylesheet" href="{{ asset('css/post.css') }}">

<div class="container" id="post-container">
    @auth
        <h3 class="mb-4 create-post-title">Create a New Post</h3>
        <form id="create-post-form" method="POST" action="{{ route('posts.storePost') }}" class="create-post-form mb-4">
            @csrf
            <div class="form-group">
                <label for="post-title" class="form-label">Title</label>
                <input type="text" name="title" id="post-title" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="post-body" class="form-label">Body</label>
                <textarea name="body" id="post-body" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary submit-btn mt-3">Create Post</button>
        </form>
        <div id="post-alert" style="display: none;"></div>
    @else
        <div class="alert alert-warning text-center mb-4 p-4 rounded bg-dark text-orange-400 border border-orange-500">
            <strong>Want to join the conversation?</strong> 
            <br>
            <a href="{{ route('login') }}" class="text-orange-300 underline">Log in</a> to create or comment on posts.
        </div>
    @endauth

    <hr class="my-4">

    <!-- Feed Section -->
    <div id="feed-section" class="feed-full">
        <h4 class="feed-title">Latest Community Posts</h4>
        <div id="feed">
            @if($posts->isNotEmpty())
                @foreach ($posts as $post)
                    <div class="post card mb-4" id="post-{{ $post->id }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->body }}</p>
                            <p class="card-text"><small class="text-muted">By: {{ $post->user->name }}</small></p>

                            <h6 class="mt-4">Comments</h6>
                            <div class="comments">
                                @foreach ($post->comments as $comment)
                                    <div class="comment p-2 mb-2 border rounded">
                                        <p>{{ $comment->body }}</p>
                                        <p><small>By: {{ $comment->user->name }}</small></p>
                                    </div>
                                @endforeach                    
                            </div>

                            @auth
                            <!-- Comment Form -->
                            <form class="comment-form mt-3" data-post-id="{{ $post->id }}">
                                @csrf
                                <div class="form-group">
                                    <label for="comment-body-{{ $post->id }}">Add a comment</label>
                                    <textarea name="body" class="form-control" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-success mt-2">Add Comment</button>
                            </form>
                            @endauth
                        </div>
                    </div>
                @endforeach
            @else
                <p class="text-center">No posts yet.</p>
            @endif
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@include('posts.partials.scripts')
@endsection
