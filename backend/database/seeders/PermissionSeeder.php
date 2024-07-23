<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Frontuser permissions
        Permission::create(['name' => 'front access', 'guard_name' => 'api']); 
        Permission::create(['name' => 'System buy', 'guard_name' => 'api']);
        Permission::create(['name' => 'Access system', 'guard_name' => 'api']);

 
        // Admin permissions
        Permission::create(['name' => 'Role access']);
        Permission::create(['name' => 'Role edit']);
        Permission::create(['name' => 'Role add']);
        Permission::create(['name' => 'Role delete']);

        Permission::create(['name' => 'Permission access']);
        Permission::create(['name' => 'Permission edit']);
        Permission::create(['name' => 'Permission add']);
        Permission::create(['name' => 'Permission delete']);

        Permission::create(['name' => 'User access']);
        Permission::create(['name' => 'User edit']);
        Permission::create(['name' => 'User add']);
        Permission::create(['name' => 'User delete']);

        Permission::create(['name' => 'System access']);
        Permission::create(['name' => 'System edit']);
        Permission::create(['name' => 'System add']);
        Permission::create(['name' => 'System delete']);

        Permission::create(['name' => 'Books']);

        Permission::create(['name' => 'Notification access']);
        Permission::create(['name' => 'Notification edit']);
        Permission::create(['name' => 'Notification add']);
        Permission::create(['name' => 'Notification delete']);

        Permission::create(['name' => 'Mail access']);
        Permission::create(['name' => 'Mail edit']);
    }
}
