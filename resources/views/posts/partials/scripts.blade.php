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
