<?php

namespace Database\Seeders;

use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $grades  = [
            [
                'grade_number' => 7,
                'system_id' => 1,
                'status' => true
            ],
            [
                'grade_number' => 8,
                'system_id' => 1,
                'status' => true
            ],
            [
                'grade_number' => 9,
                'system_id' => 1,
                'status' => true
            ],
            [
                'grade_number' => 10,
                'system_id' => 1,
                'status' => true
            ],
            [
                'grade_number' => 11,
                'system_id' => 1,
                'status' => true
            ],
            [
                'grade_number' => 12,
                'system_id' => 1,
                'status' => true
            ],
        ];
        foreach($grades as $grade) {
            Grade::create($grade);
        }
    }
}
