<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $schedules = [
            [
                'event_date' => Carbon::now()->addDays(7),
                'start_time' => '10:00:00',
                'end_time' => '14:00:00',
                'status' => 'available',
            ],
            [
                'event_date' => Carbon::now()->addDays(7),
                'start_time' => '15:00:00',
                'end_time' => '19:00:00',
                'status' => 'available',
            ],
            [
                'event_date' => Carbon::now()->addDays(14),
                'start_time' => '10:00:00',
                'end_time' => '14:00:00',
                'status' => 'available',
            ],
            [
                'event_date' => Carbon::now()->addDays(14),
                'start_time' => '15:00:00',
                'end_time' => '19:00:00',
                'status' => 'available',
            ],
            [
                'event_date' => Carbon::now()->addDays(21),
                'start_time' => '09:00:00',
                'end_time' => '17:00:00',
                'status' => 'available',
            ],
        ];

        foreach ($schedules as $schedule) {
            Schedule::create($schedule);
        }
    }
}
