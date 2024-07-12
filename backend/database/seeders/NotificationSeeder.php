<?php

namespace Database\Seeders;

use App\Models\Notificaton;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Notificaton::create([
            'user_id' => 5,
            'receiver' => 1,
            'description' => "'It's great!, I want to buy it!" 
        ]);
    }
}
