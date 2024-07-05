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
            'first_name' => 'sanvorn',
            'last_name' => 'vorn',
            'email' => 'sanvorn.vorn@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '087861976',
        ]);
        $user2 = Frontuser::create([
            'first_name' => 'channy',
            'last_name' => 'chhun',
            'email' => 'channy.chhun@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '087861976',
        ]);
        $user3 = Frontuser::create([
            'first_name' => 'sokhean',
            'last_name' => 'both',
            'email' => 'sokhean.both@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '087861976',
        ]);  
        $user4 = Frontuser::create([
            'first_name' => 'Mengkorng',
            'last_name' => 'Ly',
            'email' => 'mengkorng.ly@student.passerellesnumeriques.org',
            'password' => bcrypt('$korng369@#$'),
            'phone' => '087861976',
            'profile' => '1719935977_photo_2024-05-03_20-11-08.jpg',
        ]); 
        
        $user1->assignRole('user');
        $user2->assignRole('user');
        $user3->assignRole('user');
        $user4->assignRole('principle');

        $user1->givePermissionTo('front access');
        $user2->givePermissionTo('front access');
        $user3->givePermissionTo('front access');
        $user4->givePermissionTo('front access');
    }
}