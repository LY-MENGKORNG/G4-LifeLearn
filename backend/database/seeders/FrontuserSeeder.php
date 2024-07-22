<?php

namespace Database\Seeders;

use App\Models\Frontuser;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class FrontuserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $users = [
            [
                'first_name' => 'samorn',
                'last_name' => 'mai',
                'email' => 'samorn.mai@student.passerellesnumeriques.org',
                'password' => bcrypt('password'),
                'phone' => '087861976',
                'profile' => 'samorn.jpg',
            ],
            [
                'first_name' => 'channy',
                'last_name' => 'chhun',
                'email' => 'channy.chhun@student.passerellesnumeriques.org',
                'password' => bcrypt('password'),
                'phone' => '087861976',
                'profile' => 'channy.png',
            ],
            [
                'first_name' => 'sokheang',
                'last_name' => 'both',
                'email' => 'sokheang.both@student.passerellesnumeriques.org',
                'password' => bcrypt('password'),
                'phone' => '087861976',
                'profile' => 'sokhang.jpg',
            ],
            [
                'first_name' => 'Mengkorng',
                'last_name' => 'Ly',
                'email' => 'mengkorng.ly@student.passerellesnumeriques.org',
                'password' => bcrypt('password'),
                'phone' => '087861976',
                'profile' => '1719935977_photo_2024-05-03_20-11-08.jpg',
            ],
            [
                'first_name' => 'Savorn',
                'last_name' => 'vorn',
                'email' => 'savorn.vorn@student.passerellesnumeriques.org',
                'password' => bcrypt('password'),
                'phone' => '087861976',
                'profile' => 'savorn.jpg',
            ],
            [
                'first_name' => 'Ngor',
                'last_name' => 'mam',
                'email' => 'ng.mam@student.passerellesnumeriques.org',
                'password' => bcrypt('password'),
                'phone' => '087861976',
                'profile' => 'ngor.jpg',
            ]
        ];

        foreach ($users as $user) {
            $front_user = Frontuser::create($user);
            $front_user->assignRole('user'); 
        }
    }
}
