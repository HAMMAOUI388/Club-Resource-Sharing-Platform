<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Http;
use App\Models\Event;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\PostCmntController;
use App\Http\Controllers\ResourceController;
use App\Models\Resource;


// Route::get('/', function () {
//     $events = Event::all();
// 
//     $response = Http::get('https://api.stackexchange.com/2.3/questions', [
//         'order' => 'desc',
//         'sort' => 'activity',
//         'site' => 'stackoverflow',
//     ]);
//     Log::info($response->json());
// 
//     if ($response->successful()) {
//         $stackQuestions = $response->json()['items'];
//     } else {
//         $stackQuestions = [];
//     }
// 
//     return view('home', compact('events', 'stackQuestions'));
// })->name('home');



Route::get('/', function () {
    $events = Event::all();
    $posts = \App\Models\Post::latest()->with('comments.user')->get();
    $resources = Resource::latest()->take(3)->get();

    $response = Http::get('https://api.stackexchange.com/2.3/questions', [
        'order' => 'desc',
        'sort' => 'activity',
        'site' => 'stackoverflow',
    ]);

    $stackQuestions = $response->successful() ? $response->json()['items'] : [];

    return view('home', compact('events', 'stackQuestions', 'posts', 'resources'));
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});



Route::middleware('auth')->group(function () {
    Route::post('/posts/{post}/comments', [PostCmntController::class, 'store'])->name('comments.store');
    Route::post('/posts', [PostCmntController::class, 'storePost'])->name('posts.storePost');
});

Route::get('/posts/{slug}', [PostCmntController::class, 'show'])->name('posts.show');

Route::get('/community', [PostCmntController::class, 'community'])->name('posts.community');



Route::middleware(['auth'])->group(function () {
    Route::post('/resources', [ResourceController::class, 'store'])->name('resources.store');
    Route::get('/resources', [ResourceController::class, 'index'])->name('resources.index');
});







Route::get('/events', [EventController::class, 'index']);
Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{id}/register', [EventController::class, 'showRegistrationForm'])->middleware('auth')->name('events.register.form');
Route::post('/events/{id}/register', [EventController::class, 'register'])->name('events.register')->middleware('auth');


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


Route::get('/all-questions', [QuestionController::class, 'index'])->name('all-questions');





Route::get('/about-club', function () {
    return view('about-club');
})->name('about-club');






require __DIR__.'/auth.php';
