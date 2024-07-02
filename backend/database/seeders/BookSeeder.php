<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => 'Tum Teav', 
            'author' => 'Soum',  
            'user_id' => 2, 
            'published_at' => '2015-08-08', 
            'price' => 2.5,
        ]);
    }
}
