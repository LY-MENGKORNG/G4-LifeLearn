<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Frontuser;
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
        // Delete existing users with the same emails to prevent duplicate entries
        User::where('email', 'admin@gmail.com')->delete();
        Frontuser::where('email', 'mengkorng.ly@gmail.com')->delete();

        // Create users
        $admin = User::create([
            'first_name' => 'My',
            'last_name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '087861976',
            'profile' => 'user.avif',
        ]);

        $user = Frontuser::create([
            'first_name' => 'Mengkorng',
            'last_name' => 'Ly',
            'email' => 'mengkorng.ly@gmail.com',
            'password' => bcrypt('password'),
            'phone' => '087861976',
            'profile' => '1719084702_photo_2023-11-03_22-01-29.jpg',
        ]); 

        // Create roles with appropriate guards
        $admin_role = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        $user_role = Role::create(['name' => 'user', 'guard_name' => 'front']);

        // Create permissions with appropriate guards
        $role_access_permission = Permission::create(['name' => 'Role access', 'guard_name' => 'front']);
        $role_edit_permission = Permission::create(['name' => 'Role edit']);
        $role_create_permission = Permission::create(['name' => 'Role create']);
        $role_delete_permission = Permission::create(['name' => 'Role delete']);

        $admin->givePermissionTo([
            $role_edit_permission,
            $role_create_permission,
            $role_delete_permission
        ]);

        $user->givePermissionTo([$role_access_permission]);

        $admin->assignRole($admin_role);
        $user->assignRole($user_role);
    }
}
