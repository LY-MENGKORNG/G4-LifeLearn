<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CalendarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $startDate = Carbon::create(2024, 1, 1);
        $endDate = Carbon::create(2024, 12, 31);
        $data = [];

        for ($date = $startDate; $date->lte($endDate); $date->addDay()) {
            $data[] = [
                'time' => '00:00:00',
                'day' => $date->dayOfWeekIso, // Monday=1, Sunday=7
                'week' => $date->isoWeek,
                'month' => $date->month,
                'year' => $date->year,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('calendars')->insert($data);
    }
}
