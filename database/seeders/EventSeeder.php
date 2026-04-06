<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Event;

class EventSeeder extends Seeder
{
    public function run()
    {
        Event::create([
            'title' => 'Seminar Cybersecurity dan Blockchain',
            'description' => 'Membahas tren keamanan siber dan teknologi desentralisasi',
            'event_date' => '2026-05-15 09:00:00',
            'capacity' => 2, 
            'status' => 'aktif'
        ]);
    }
}