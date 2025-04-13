<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Resource;

class QuestionController extends Controller
{
    private $apiUrl = 'https://api.stackexchange.com/2.3';

    // Fetch Stack Overflow questions
    public function index()
    {
        // Fetch questions from Stack Overflow API
        $response = Http::get("{$this->apiUrl}/questions", [
            'order' => 'desc',
            'sort' => 'activity',
            'site' => 'stackoverflow',
            'tagged' => 'laravel',
            'pagesize' => 5
        ]);

        // Check if the API request was successful
        if ($response->successful()) {
            // Assign the response data to $stackQuestions (default to an empty array if not found)
            $stackQuestions = $response->json()['items'] ?? [];
        } else {
            // Log the error if the API call fails
            Log::error('Error fetching Stack Overflow data: ' . $response->status());
            // Set an empty array if the API request fails
            $stackQuestions = [];
        }

        // Return the view and pass the $stackQuestions variable to the view
        return view('all-questions', compact('stackQuestions'));
    }



}
