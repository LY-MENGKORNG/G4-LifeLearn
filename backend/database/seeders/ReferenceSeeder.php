<?php

namespace Database\Seeders;

use App\Models\Reference;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Reference::create([
            'user_id' => 5,
            'school_name' => 'Hun sen Peamchi kang',
            'school_address' => 'Kampong cham'
        ]);
    }
} 