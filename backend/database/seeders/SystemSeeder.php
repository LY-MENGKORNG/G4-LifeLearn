<?php

namespace Database\Seeders;

use App\Models\Frontuser;
use App\Models\System;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        System::create([
            'name' => 'Hun Sen Peamchi Kang High School',
            'user_id' => Frontuser::find(1)->id ?? null,
            'location' => 'KPC'
        ]);
    }
}
