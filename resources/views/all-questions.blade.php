<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Questions</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ secure_asset('css/questions.css') }}">

</head>
<body class="bod">
    <div class="container mt-4">
        <h1 class="mb-4">Latest Stack Overflow Questions (Tagged: Laravel)</h1>
        @if(empty($stackQuestions))
        <p>The data is null or empty. Please check your API request.</p>
        @elseif(count($stackQuestions) > 0)
        <ul class="list-group">
            @foreach($stackQuestions as $question)

                <li class="list-group-item">
                    <a href="{{ $question['link'] }}" target="_blank">
                        {{ $question['title'] }}
                    </a>
                    <div class="small text-muted">
                        Asked by: {{ $question['owner']['display_name'] ?? 'Unknown' }} |
                        Score: {{ $question['score'] }} |
                        Answers: {{ $question['answer_count'] }}
                    </div>
                </li>
            @endforeach
        </ul>
    @else
        <p>No Stack Overflow questions found.</p>
    @endif

    </div>



</body>
</html>
