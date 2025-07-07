<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Industry 4.0</title>
    <link rel="stylesheet" href="{{ asset('css/post.css') }}">
</head>
<body>

<div class="posts-container" id="post-container">
        @auth
            <h3 class="mb-4 create-post-title">Create New Post</h3>
            <form id="create-post-form" method="POST" action="{{ route('posts.storePost') }}" class="create-post-form mb-4">
                @csrf
                <div class="form-group">
                    <label for="post-title" class="form-label">Title</label>
<input type="text" name="title" id="post-title" class="create-input" required>
                </div>
                <div class="form-group">
                    <label for="post-body" class="form-label">Body</label>
<textarea name="body" id="post-body" class="create-textarea" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary submit-btn mt-3">CREATE POST</button>
            </form>
            <div id="post-alert" style="display: none;"></div>
        @endauth
    
    <hr class="my-4">
<div>
    <h2 class="feed-title">Latest Community Posts</h2>
</div>
    <!-- Feed Section -->
<div id="feed-section" class="feed-scrollable">
        <div id="feed">
            @if(isset($posts) && $posts->isNotEmpty())
                @foreach ($posts as $post)
<div class="post card mb-4" id="post-{{ $post->id }}">
    <div class="card-body">
        <div class="post-content">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->body }}</p>
            <p class="card-text"><small class="text-muted">By: {{ $post->user->name }}</small></p>
        </div>

        <h2 class="mt-4">Comments</h2>
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
                <label for="comment-body-{{ $post->id }}">ADD A COMMENT</label>
                <textarea name="body" class="comment-input" required></textarea>
            </div>
            <button type="submit" class="btn btn-success mt-2">ADD COMMENT</button>
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


    <div class="see-more-wrapper">
        <a href="{{ route('posts.community') }}" class="see-more-btn">SEE MORE</a>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

    $('#create-post-form').on('submit', function (e) {
        e.preventDefault();

        const title = $('#post-title').val();
        const body = $('#post-body').val();
        const csrfToken = $('meta[name="csrf-token"]').attr('content');

        fetch('{{ route("posts.storePost") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken,
                'Accept': 'application/json'
            },
            body: JSON.stringify({ title, body })
        })
        .then(res => {
            if (!res.ok) throw new Error("Network response was not ok");
            return res.json();
        })
        .then(data => {
            const post = data.post;
            const newPostHtml = `
                <div class="post card mb-4" id="post-${post.id}">
                    <div class="card-body">
                        <h5 class="card-title">${post.title}</h5>
                        <p class="card-text">${post.body}</p>
                        <p class="card-text"><small class="text-muted">By: ${post.user.name}</small></p>
                        <h6 class="mt-4">Comments</h6>
                        <div class="comments"></div>
                        <form class="comment-form mt-3" data-post-id="${post.id}">
                            <div class="form-group">
                                <label>Add a comment</label>
                                <textarea name="body" class="form-control" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-2">Add Comment</button>
                        </form>
                    </div>
                </div>
            `;
            $('#feed').prepend(newPostHtml);
            $('#create-post-form')[0].reset();
            showPostAlert('Post created successfully!', 'success');
        })
        .catch(error => {
            console.error('Error:', error);
            showPostAlert('Error creating post!', 'error');
        });
    });

    $('#feed').on('submit', '.comment-form', function (e) {
        e.preventDefault();
        const form = $(this);
        const postId = form.data('post-id');
        const formData = form.serialize();

        $.ajax({
            url: `/posts/${postId}/comments`,
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Accept': 'application/json'
            },
            success: function (response) {
                const comment = response.comment;

                const newCommentHtml = `
                    <div class="comment p-2 mb-2 border rounded">
                        <p>${comment.body}</p>
                        <p><small>By: ${comment.user.name}</small></p>
                    </div>
                `;

                form.prev('.comments').append(newCommentHtml);
                form[0].reset();
            },
            error: function (xhr) {
                console.error(xhr.responseText);
                alert('Error adding comment!');
            }
        });
    });

    function showPostAlert(message, type) {
        const alertBox = $('#post-alert');
        alertBox.text(message)
            .css({
                background: type === 'success' ? '#d4edda' : '#f8d7da',
                color: type === 'success' ? '#155724' : '#721c24',
                padding: '10px',
                marginTop: '10px',
                borderRadius: '5px',
                display: 'block'
            });

        setTimeout(() => {
            alertBox.fadeOut();
        }, 3000);
    }
});
</script>

</body>
</html>
