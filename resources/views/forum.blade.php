@extends('layouts.app')

@section('content')
    <link href="{{ asset('slider/forum.css') }}" rel="stylesheet">

    @if(isset($questions) && !empty($questions))
        <h2>Latest Stack Overflow Questions</h2>
        <ul>
            @foreach($questions as $question)
                <li>
                    <a href="https://stackoverflow.com/questions/{{ $question['question_id'] }}" target="_blank">
                        {{ $question['title'] }}
                    </a>
                    <p>Asked by: {{ $question['owner']['display_name'] }}</p>
                    <p>Votes: {{ $question['score'] }} | Answers: {{ $question['answer_count'] }}</p>
                </li>
            @endforeach
        </ul>
    @else
        <p>No questions available at the moment.</p>
    @endif
@endsection
