<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Registration;

class ParticipantController extends Controller
{
    public function index($eventId)
    {
        $event = Event::findOrFail($eventId);
        $participants = Registration::with('user')->where('event_id', $eventId)->get();

        return view('participants', compact('event', 'participants'));
    }

    public function verifyAttendance($registrationId)
    {
        $registration = Registration::findOrFail($registrationId);
        $registration->update(['status' => 'hadir']);

        return back()->with('success', 'Kehadiran berhasil diverifikasi!');
    }
}
