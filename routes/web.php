<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Http;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\StackOverflowController;


Route::get('/', function () {
    // Fetch events
    $events = Event::all();

    // Fetch forum questions from Stack Overflow API
    $response = Http::get('https://api.stackexchange.com/2.3/questions', [
        'order' => 'desc',
        'sort' => 'activity',
        'site' => 'stackoverflow',
    ]);
    Log::info($response->json());

    // Check the response
    if ($response->successful()) {
        $questions = $response->json()['items']; // Stack Overflow returns 'items' with the questions
    } else {
        $questions = [];
    }

    return view('home', compact('events', 'questions'));
})->name('home');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register');


Route::middleware('guest')->group(function () {

    // Login Routes
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    // Register Routes
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

// Auth logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->middleware('auth')->name('logout');





// routes/web.php


Route::get('/login/stackoverflow', [StackOverflowController::class, 'redirectToProvider']); // Redirect to Stack Overflow
Route::get('/callback', [StackOverflowController::class, 'handleProviderCallback']); // Handle the callback after authentication
Route::post('/post-question', [StackOverflowController::class, 'postQuestion'])->name('post.question');
Route::post('/post-answer', [StackOverflowController::class, 'postAnswer'])->name('post.answer');


require __DIR__.'/auth.php';
