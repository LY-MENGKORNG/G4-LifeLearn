<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(SystemSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(ClassSeeder::class);
        $this->call(ClassroomSeeder::class);
        $this->call(LessonSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(FrontuserSeeder::class);
        $this->call(BookSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(MailsettingSeeder::class);
    }
}
