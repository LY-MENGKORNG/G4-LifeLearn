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

        // Create roles with appropriate guards
        $admin_role = Role::create(['name' => 'admin']);
        $user_role = Role::create(['name' => 'user', 'guard_name' => 'front']);
        $principle_role = Role::create(['name' => 'principle', 'guard_name' => 'front']);
        $teacher_role = Role::create(['name' => 'teacher', 'guard_name' => 'front']);
        $student_role = Role::create(['name' => 'student', 'guard_name' => 'front']);

        $role_front_user = Permission::create(['name' => 'front access', 'guard_name' => 'front']);
        
        // 
        $system_buy = Permission::create(['name' => 'System buy', 'guard_name' => 'front']);
        $system_buy = Permission::create(['name' => 'Access system', 'guard_name' => 'front']);

        // 
        $role_access_permission = Permission::create(['name' => 'Role access']);
        $role_edit_permission = Permission::create(['name' => 'Role edit']);
        $role_add_permission = Permission::create(['name' => 'Role add']);
        $role_delete_permission = Permission::create(['name' => 'Role delete']);

        // 
        $permission_access_permission = Permission::create(['name' => 'Permission access']);
        $permission_edit_permission = Permission::create(['name' => 'Permission edit']);
        $permission_add_permission = Permission::create(['name' => 'Permission add']);
        $permission_delete_permission = Permission::create(['name' => 'Permission delete']);

        // 
        $user_access_permission = Permission::create(['name' => 'User access']);
        $user_edit_permission = Permission::create(['name' => 'User edit']);
        $user_add_permission = Permission::create(['name' => 'User add']);
        $user_delete_permission = Permission::create(['name' => 'User delete']);

        // 
        $system_access_permission = Permission::create(['name' => 'System access']);
        $system_edit_permission = Permission::create(['name' => 'System edit']);
        $system_add_permission = Permission::create(['name' => 'System add']);
        $system_delete_permission = Permission::create(['name' => 'System delete']);

        //
        $book_permissions = Permission::create(['name' => 'Books']);

        // 
        $notification_access_permission = Permission::create(['name' => 'Notification access']);
        $notification_edit_permission = Permission::create(['name' => 'Notification edit']);
        $notification_add_permission = Permission::create(['name' => 'Notification add']);
        $notification_delete_permission = Permission::create(['name' => 'Notification delete']);

        // 
        $mail_access_permission = Permission::create(['name' => 'Mail access']);
        $mail_edit_permission = Permission::create(['name' => 'Mail edit']);

        
        $admin->assignRole('admin');

        $admin_role->givePermissionTo([
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
        ]);
    }
}
