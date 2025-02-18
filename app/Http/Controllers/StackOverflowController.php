<?php
// app/Http/Controllers/StackOverflowController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // For making HTTP requests
use Illuminate\Support\Facades\Session; // For managing session

class StackOverflowController extends Controller
{
    // Step 1: Redirect to Stack Overflow for authentication
    public function redirectToProvider()
    {
        $client_id = env('STACKOVERFLOW_CLIENT_ID');
        $redirect_uri = env('STACKOVERFLOW_REDIRECT_URI');
        $scope = 'no_expiry'; // Modify scope if necessary
        $state = bin2hex(random_bytes(16)); // Generate random state for CSRF protection

        // Store the state in session
        session(['oauth_state' => $state]);

        // Construct the OAuth URL
        $auth_url = 'https://stackoverflow.com/oauth?client_id=' . $client_id . '&redirect_uri=' . urlencode($redirect_uri) . '&scope=' . $scope . '&state=' . $state;

        // Redirect to Stack Overflow for authentication
        return redirect()->to($auth_url);
    }

    // Step 2: Handle the callback from Stack Overflow
    public function handleProviderCallback(Request $request)
    {
        $client_id = env('STACKOVERFLOW_CLIENT_ID');
        $client_secret = env('STACKOVERFLOW_CLIENT_SECRET');
        $redirect_uri = env('STACKOVERFLOW_REDIRECT_URI');

        // Ensure the state matches the one sent earlier to prevent CSRF attacks
        if ($request->state !== session('oauth_state')) {
            return response('Invalid state', 400);
        }

        // Exchange the authorization code for an access token
        $response = Http::asForm()->post('https://stackoverflow.com/oauth/access_token', [
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'code' => $request->code,
            'redirect_uri' => $redirect_uri
        ]);

        // Check if the request was successful
        if ($response->failed()) {
            return response('Failed to obtain access token', 500);
        }

        // Parse the access token
        parse_str($response->body(), $data);
        $access_token = $data['access_token'];

        // Store the access token in session or database
        Session::put('access_token', $access_token);

        // Redirect to a dashboard or other authenticated page
        return redirect()->route('dashboard');
    }

    // Step 3: Make API requests with the access token
    public function getUserData()
    {
        $access_token = Session::get('access_token');

        // Make an API request to Stack Overflow to fetch user data
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $access_token
        ])->get('https://api.stackexchange.com/2.3/me?site=stackoverflow');

        if ($response->failed()) {
            return response('Failed to fetch user data', 500);
        }

        $user_data = $response->json();
        return view('dashboard', compact('user_data'));
    }

    public function postQuestion(Request $request)
{
    $accessToken = session('stack_overflow_token');

    if (!$accessToken) {
        return redirect()->route('login.stackoverflow')->with('error', 'Please log in to post a question.');
    }

    $response = Http::withToken($accessToken)
        ->asForm()
        ->post('https://api.stackexchange.com/2.3/questions/add', [
            'site' => 'stackoverflow',
            'title' => $request->input('title'),
            'body' => $request->input('body'),
            'tags' => explode(',', $request->input('tags')),
        ]);

    if ($response->failed()) {
        return back()->with('error', 'Failed to post question.');
    }

    return redirect()->route('forum')->with('success', 'Question posted successfully!');
}




public function postAnswer(Request $request)
{
    $accessToken = session('stack_overflow_token');

    if (!$accessToken) {
        return redirect()->route('login.stackoverflow')->with('error', 'Please log in to post an answer.');
    }

    $response = Http::withToken($accessToken)
        ->asForm()
        ->post("https://api.stackexchange.com/2.3/questions/{$request->input('question_id')}/answers/add", [
            'site' => 'stackoverflow',
            'body' => $request->input('answer'),
        ]);

    if ($response->failed()) {
        return back()->with('error', 'Failed to post answer.');
    }

    return redirect()->route('forum')->with('success', 'Answer posted successfully!');
}

}
