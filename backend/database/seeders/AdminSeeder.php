<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create users
        $admin = User::create([
            'first_name' => 'My',
            'last_name' => 'Admin',
            'email' => 'lymengkorng54@gmail.com',
            'password' => bcrypt('54@meng#korng$!'),
            'phone' => '087861976',
            'profile' => '1719935977_photo_2024-05-03_20-11-08.jpg',
        ]); 

        $admin->assignRole('admin'); 
    }
}
