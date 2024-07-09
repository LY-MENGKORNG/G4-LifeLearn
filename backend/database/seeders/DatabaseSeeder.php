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
        $this->call(AdminSeeder::class);
        $this->call(FrontuserSeeder::class);
        $this->call(MailsettingSeeder::class);
        $this->call(ReferenceSeeder::class);
        $this->call(DocumentSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(SystemSeeder::class);
        $this->call(BookSeeder::class);
    }
}
