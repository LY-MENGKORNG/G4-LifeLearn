<?php

namespace Database\Seeders;

use App\Models\Lesson;
use Illuminate\Database\Seeder;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lesson::create([
            'classroom_id' => 1,
            'system_id' => 1,
            'title' => "Basic Html ",
            'content' => 'Lecture1.pdf',
        ]);
    }
}
