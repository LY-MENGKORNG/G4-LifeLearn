<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Course::create([
            'title' => 'English Teacher',
            'description' => 'Inspire, educate, and cultivate a love for language and literature.',
            'category_id' => 1,
            'price' => 5000,
            'user_id' => 1,
            'duration' => 50,
            'cover' => 'https://images.pexels.com/photos/968299/pexels-photo-968299.jpeg?auto=compress&cs=tinysrgb&w=600',
        ]);
        Course::create([
            'title' => 'UX Designer',
            'description' => 'Design intuitive and engaging user experiences for digital products.',
            'category_id' => 2,
            'price' => 3000,
            'user_id' => 2,
            'duration' => 150,
            'cover' => 'https://images.pexels.com/photos/196644/pexels-photo-196644.jpeg?auto=compress&cs=tinysrgb&w=600',
        ]);
        Course::create([
            'title' => 'Back-End developer',
            'description' => 'Develop and maintain the server-side logic, databases, and APIs for web applications.',
            'category_id' => 1,
            'price' => 5000,
            'user_id' => 1,
            'duration' => 50,
            'cover' => 'https://images.pexels.com/photos/1181263/pexels-photo-1181263.jpeg?auto=compress&cs=tinysrgb&w=600',
        ]);
        Course::create([
            'title' => 'Front-End developer',
            'description' => 'Create visually appealing and user-friendly interfaces for web applications.',
            'category_id' => 1,
            'price' => 5000,
            'user_id' => 1,
            'duration' => 50,
            'cover' => 'https://images.pexels.com/photos/1181371/pexels-photo-1181371.jpeg?auto=compress&cs=tinysrgb&w=600',
        ]);
    }
}
