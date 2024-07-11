<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mailsetting;

class MailsettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Mailsetting::create([
            'mail_transport'            =>'smtp',
            'mail_host'                 =>'smtp.mailtrap.io',
            'mail_port'                 =>'2525',
            'mail_username'             =>'lymengkorng54@gmail.com',
            'mail_password'             =>'xtliypzraxovkqji',
            'mail_encryption'           =>'tls',
            'mail_from'                 => 'lymengkorng54@gmail.com',
        ]);
    }
}
