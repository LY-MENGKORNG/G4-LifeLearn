<?php

namespace Database\Seeders;

use App\Models\Classroom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classrooms = [
            [
                'grade_id' => 1,
                'class_name' => 'HTML',
                'user_id' => 6
            ],
            [
                'grade_id' => 1,
                'class_name' => 'Algorithms',
                'user_id' => 7
            ]
        ];

        foreach($classrooms as $classroom) {
            Classroom::create($classroom);
        }
    }
}
