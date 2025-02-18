<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log; // <-- Add this line


class ForumController extends Controller
{
    public function index()
    {
        // Stack Overflow API URL to fetch questions
        $response = Http::get('https://api.stackexchange.com/2.3/questions', [
            'order' => 'desc',
            'sort' => 'activity',
            'site' => 'stackoverflow', // For Stack Overflow
        ]);

// Log the response to check if data is being returned properly
Log::info($response->json());

if ($response->successful()) {
    $questions = $response->json()['items']; // Stack Overflow returns 'items' with the questions
    return view('forum', compact('questions'));
} else {
    Log::error('Error fetching Stack Overflow data');
    return view('forum', ['error' => 'Could not fetch data from Stack Overflow.']);
}



    }
}

