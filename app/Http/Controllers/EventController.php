<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Models\Post;

class EventController extends Controller
{


public function index()
{
    $events = Event::all();
    return view('event', ['events' => $events]);
}


public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('single_event', compact('event'));
    }

public function showRegistrationForm($id)
{
    $event = Event::findOrFail($id);
    return view('registeraevent', compact('event'));
}


public function register(Request $request, $id)
{
    $event = Event::findOrFail($id);
    $user = $request->user();

    // Check if already registered (optional)
    // if(EventRegistration::where('event_id', $event->id)->where('email', $user->email)->exists()) {
    //     return redirect()->route('events.show', $event->id)->with('success', 'You are already registered.');
    // }

    EventRegistration::create([
        'event_id' => $event->id,
        'name' => $user->name,
        'email' => $user->email,
    ]);

    return redirect()->route('events.show', $id)->with('success', 'You are successfully registered to attend this event.');
}


}
