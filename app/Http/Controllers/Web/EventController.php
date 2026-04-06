<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderBy('event_date', 'desc')->get();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:aktif,arsip'
        ]);

        Event::create($request->all());

        return redirect('/events')->with('success', 'Acara baru berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'event_date' => 'required|date',
            'capacity' => 'required|integer|min:1',
            'status' => 'required|in:aktif,arsip'
        ]);

        $event = Event::findOrFail($id);
        $event->update($request->all());

        return redirect('/events')->with('success', 'Data acara berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return redirect('/events')->with('success', 'Acara berhasil dihapus!');
    }
}