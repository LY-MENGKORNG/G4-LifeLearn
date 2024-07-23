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
                'user' => [
                    'first_name' => 'samorn',
                    'last_name' => 'mai',
                    'email' => 'samorn.mai@student.passerellesnumeriques.org',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => 'samorn.jpg',
                ],
                'role' => 'user'
            ],
            [
                'user' =>
                [
                    'first_name' => 'channy',
                    'last_name' => 'chhun',
                    'email' => 'channy.chhun@student.passerellesnumeriques.org',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => 'channy.png',
                ],
                'role' => 'user'
            ],
            [
                'user' =>
                [
                    'first_name' => 'sokheang',
                    'last_name' => 'both',
                    'email' => 'sokheang.both@student.passerellesnumeriques.org',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => 'sokhang.jpg',
                ],
                'role' => 'user'
            ],
            [
                'user' =>
                [
                    'first_name' => 'Mengkorng',
                    'last_name' => 'Ly',
                    'email' => 'mengkorng.ly@student.passerellesnumeriques.org',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => '1719935977_photo_2024-05-03_20-11-08.jpg',
                ],
                'role' => 'user'
            ],
            [
                'user' =>
                [
                    'first_name' => 'Savorn',
                    'last_name' => 'vorn',
                    'email' => 'savorn.vorn@student.passerellesnumeriques.org',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => 'savorn.jpg',
                ],
                'role' => 'user'
            ],
            [
                'user' =>
                [
                    'first_name' => 'Ngor',
                    'last_name' => 'mam',
                    'email' => 'ng.mam@student.passerellesnumeriques.org',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => 'ngor.jpg',
                    'system_id' => 1
                ],
                'role' => 'teacher'
            ],
            [
                'user' =>
                [
                    'first_name' => 'Jonh',
                    'last_name' => 'Christian',
                    'email' => 'lymengkorng54@gmail.com',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => '1719084702_photo_2023-11-03_22-01-29.jpg',
                    'system_id' => 1
                ],
                'role' => 'teacher'
            ],
            [
                'user' =>
                [
                    'first_name' => 'Mengleap',
                    'last_name' => 'Ly',
                    'email' => 'mengkorng.ly@gmail.com',
                    'password' => bcrypt('password'),
                    'phone' => '087861976',
                    'profile' => '1719084702_photo_2023-11-03_22-01-29.jpg',
                    'system_id' => 1
                ],
                'role' => 'principle'
            ]
        ];

        foreach ($users as $user) {
            $front_user = Frontuser::create($user['user']);
            $front_user->assignRole($user['role']);
        }
    }
}
