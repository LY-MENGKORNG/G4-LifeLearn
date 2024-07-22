<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin_permissions = [
            'Role access',
            'Role add',
            'Role edit',
            'Role delete',

            'Permission access',
            'Permission add',
            'Permission edit',
            'Permission delete',

            'User access',
            'User add',
            'User edit',
            'User delete',

            'System access',
            'System add',
            'System edit',
            'System delete',

            'Notification access',
            'Notification add',
            'Notification edit',
            'Notification delete',

            'Mail access',
            'Mail edit',
        ];
        $users_permission =  'front access';
        Role::create(['name' => 'admin', 'guard_name' => 'web'])->givePermissionTo($admin_permissions);
        Role::create(['name' => 'user', 'guard_name' => 'api'])->givePermissionTo($users_permission);
        Role::create(['name' => 'principle', 'guard_name' => 'api'])->givePermissionTo($users_permission);
        Role::create(['name' => 'teacher', 'guard_name' => 'api'])->givePermissionTo($users_permission);
        Role::create(['name' => 'student', 'guard_name' => 'api'])->givePermissionTo($users_permission);
    }
}
