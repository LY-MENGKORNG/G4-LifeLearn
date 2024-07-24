<?php

namespace Database\Seeders;

use App\Models\Classes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classes = [
            [
                'name' => 'A',
                'grade_id' => 7,
                'system_id' => 1
            ],
            [
                'name' => 'B',
                'grade_id' => 7,
                'system_id' => 1
            ],
            [
                'name' => 'C',
                'grade_id' => 7,
                'system_id' => 1
            ],
            [
                'name' => 'D',
                'grade_id' => 7,
                'system_id' => 1
            ],
            [
                'name' => 'E',
                'grade_id' => 7,
                'system_id' => 1
            ],
            
            [
                'name' => 'A',
                'grade_id' => 8,
                'system_id' => 1
            ],
            [
                'name' => 'B',
                'grade_id' => 8,
                'system_id' => 1
            ],
            [
                'name' => 'C',
                'grade_id' => 8,
                'system_id' => 1
            ],
            [
                'name' => 'D',
                'grade_id' => 8,
                'system_id' => 1
            ],
            [
                'name' => 'E',
                'grade_id' => 8,
                'system_id' => 1
            ],
            
            [
                'name' => 'A',
                'grade_id' => 9,
                'system_id' => 1
            ],
            [
                'name' => 'B',
                'grade_id' => 9,
                'system_id' => 1
            ],
            [
                'name' => 'C',
                'grade_id' => 9,
                'system_id' => 1
            ],
            [
                'name' => 'D',
                'grade_id' => 9,
                'system_id' => 1
            ],
            [
                'name' => 'E',
                'grade_id' => 9,
                'system_id' => 1
            ],
            
            [
                'name' => 'A',
                'grade_id' => 10,
                'system_id' => 1
            ],
            [
                'name' => 'B',
                'grade_id' => 10,
                'system_id' => 1
            ],
            [
                'name' => 'C',
                'grade_id' => 10,
                'system_id' => 1
            ],
            [
                'name' => 'D',
                'grade_id' => 10,
                'system_id' => 1
            ],
            [
                'name' => 'E',
                'grade_id' => 10,
                'system_id' => 1
            ],
            
            [
                'name' => 'A',
                'grade_id' => 11,
                'system_id' => 1
            ],
            [
                'name' => 'B',
                'grade_id' => 11,
                'system_id' => 1
            ],
            [
                'name' => 'C',
                'grade_id' => 11,
                'system_id' => 1
            ],
            [
                'name' => 'D',
                'grade_id' => 11,
                'system_id' => 1
            ],
            [
                'name' => 'E',
                'grade_id' => 11,
                'system_id' => 1
            ],
            
            [
                'name' => 'A',
                'grade_id' => 12,
                'system_id' => 1
            ],
            [
                'name' => 'B',
                'grade_id' => 12,
                'system_id' => 1
            ],
            [
                'name' => 'C',
                'grade_id' => 12,
                'system_id' => 1
            ],
            [
                'name' => 'D',
                'grade_id' => 12,
                'system_id' => 1
            ],
            [
                'name' => 'E',
                'grade_id' => 12,
                'system_id' => 1
            ],
        ];

        foreach($classes as $class) {
            Classes::create($class);
        }
    }
}
