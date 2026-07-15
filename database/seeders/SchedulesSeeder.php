<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Schedule;

class SchedulesSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = [
            ['subject_id' => 1, 'date' => '2026-06-15', 'time' => '10:00', 'type' => 'exam', 'audience' => '201'],
            ['subject_id' => 2, 'date' => '2026-06-18', 'time' => '12:00', 'type' => 'zachet', 'audience' => '305'],
            ['subject_id' => 3, 'date' => '2026-06-20', 'time' => '09:30', 'type' => 'exam', 'audience' => '108'],
            ['subject_id' => 4, 'date' => '2026-06-22', 'time' => '14:00', 'type' => 'zachet', 'audience' => '402'],
            ['subject_id' => 5, 'date' => '2026-06-25', 'time' => '11:00', 'type' => 'exam', 'audience' => '203'],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}