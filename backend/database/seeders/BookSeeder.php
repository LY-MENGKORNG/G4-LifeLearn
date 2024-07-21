<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Playing in The Rain', 
            'published_at' => '2018-08-08', 
            'cover' => 'playing-in-the-rain.jpg',
            'file' => 'Playing-in-The-Rain.pdf',
            'category_id' => 1,
        ]);
    }
}
