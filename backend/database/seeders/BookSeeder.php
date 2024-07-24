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
            'published_date' => '2018-08-08', 
            'cover' => 'playing-in-the-rain.jpg',
            'file' => 'Playing-in-The-Rain.pdf',
            'category_id' => 1,
            'price' => 0,
            'description' => 'Enjoy with this book',
            'system_id' => 1, 
        ]);
        Book::create([
            'title' => 'Playing in The Rain', 
            'published_date' => '2023-07-23', 
            'cover' => '1721720672_download.jfif',
            'file' => '1721720672_Wyvern.pdf',
            'category_id' => 2,
            'price' => 0,
            'description' => 'The Prince of Shade stirs and grows impatient. The time is close... soon he will be free and the world will burn!',
            'system_id' => 1
        ]);
    }
}
