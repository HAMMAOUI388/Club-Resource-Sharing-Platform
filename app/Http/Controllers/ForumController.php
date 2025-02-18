<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class ForumController extends Controller
{
    public function index()
    {
        $response = Http::get('https://api.stackexchange.com/2.3/questions', [
            'order' => 'desc',
            'sort' => 'activity',
            'site' => 'stackoverflow',
        ]);

Log::info($response->json());

if ($response->successful()) {
    $questions = $response->json()['items'];
    return view('forum', compact('questions'));
} else {
    Log::error('Error fetching Stack Overflow data');
    return view('forum', ['error' => 'Could not fetch data from Stack Overflow.']);
}



    }
}

