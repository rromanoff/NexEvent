<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::where('status', 'aktif')
                       ->orderBy('event_date', 'asc')
                       ->get();

        return response()->json([
            'message' => 'Berhasil mengambil daftar acara',
            'data' => $events
        ]);
    }
}
