<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('event', ['events' => $events]); // Now events will be available in Blade
    }



    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('single_event', compact('event')); // New Blade file for single event
    }


    public function register(Request $request, $id)
{
    $event = Event::findOrFail($id);

    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
    ]);

    EventRegistration::create([
        'event_id' => $event->id,
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('events.show', ['id' => $event->id])->with('success', 'Inscription réussie!');
}


}
