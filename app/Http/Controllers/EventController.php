<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date')->paginate(10);
        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }


    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'required|string',
        ]);

        Event::create($request->all());

        return redirect()->route('events.index')->with('success', 'Event added!');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'description' => 'required|string',
        ]);

        $event->update($request->all());

        return redirect()->route('events.index')->with('success', 'Event updated!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events.index')->with('success', 'Event deleted!');
    }
}
