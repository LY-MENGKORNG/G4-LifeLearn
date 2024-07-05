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
            'mail_username'             =>'ed3caa94a48fd1',
            'mail_password'             =>'54@meng#korng$!',
            'mail_encryption'           =>'tls',
            'mail_from'                 => 'lymengkorng54@gmail.com',
        ]);
    }
}
