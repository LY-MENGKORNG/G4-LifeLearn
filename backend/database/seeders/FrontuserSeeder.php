<?php

namespace Database\Seeders;

use App\Models\Frontuser;
use Illuminate\Database\Seeder;

class FrontuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = Frontuser::create([
            'first_name' => 'samorn',
            'last_name' => 'mai',
            'email' => 'samorn.mai@student.passerellesnumeriques.org',
            'password' => bcrypt('password'),
            'phone' => '087861976',
            'profile' => 'samorn.jpg',
        ]);
        $user2 = Frontuser::create([
            'first_name' => 'channy',
            'last_name' => 'chhun',
            'email' => 'channy.chhun@student.passerellesnumeriques.org',
            'password' => bcrypt('password'),
            'phone' => '087861976',
            'profile' => 'channy.png',
        ]);
        $user3 = Frontuser::create([
            'first_name' => 'sokhean',
            'last_name' => 'both',
            'email' => 'sokhean.both@student.passerellesnumeriques.org',
            'password' => bcrypt('password'),
            'phone' => '087861976',
            'profile' => 'sokhang.jpg',
        ]);  
        $user4 = Frontuser::create([
            'first_name' => 'Mengkorng',
            'last_name' => 'Ly',
            'email' => 'mengkorng.ly@student.passerellesnumeriques.org',
            'password' => bcrypt('$korng369@#$'),
            'phone' => '087861976',
            'profile' => '1719935977_photo_2024-05-03_20-11-08.jpg',
        ]); 
        $user5 = Frontuser::create([
            'first_name' => 'Savorn',
            'last_name' => 'vorn',
            'email' => 'savorn.vorn@student.passerellesnumeriques.org',
            'password' => bcrypt('password'),
            'phone' => '087861976',
            'profile' => 'savorn.jpg',
        ]); 
        $user6 = Frontuser::create([
            'first_name' => 'Ngor',
            'last_name' => 'mam',
            'email' => 'ng.mam@student.passerellesnumeriques.org',
            'password' => bcrypt('password'),
            'phone' => '087861976',
            'profile' => 'ngor.jpg',
        ]);
        
        $user1->assignRole('user');
        $user2->assignRole('principle');
        $user3->assignRole('teacher');
        $user4->assignRole('student');
        $user5->assignRole('user');
        $user6->assignRole('user');

        $user1->givePermissionTo('front access');
        $user2->givePermissionTo('front access');
        $user3->givePermissionTo('front access');
        $user4->givePermissionTo('front access');
        $user5->givePermissionTo('front access');
        $user6->givePermissionTo('front access');
    }
}