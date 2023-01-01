<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->delete();

        $data = [
            ['type' => 'current_session', 'description' => '2022-2023'],
            ['type' => 'system_title', 'description' => 'US'],
            ['type' => 'system_name', 'description' => 'University State'],
            ['type' => 'term_ends', 'description' => '3/31/2023'],
            ['type' => 'term_begins', 'description' => '1/1/2023'],
            ['type' => 'phone', 'description' => '0123456789'],
            ['type' => 'address', 'description' => 'Nairobi, Kenya'],
            ['type' => 'system_email', 'description' => 'universitystate@universitystate.com'],
            ['type' => 'alt_email', 'description' => ''],
            ['type' => 'email_host', 'description' => ''],
            ['type' => 'email_pass', 'description' => ''],
            ['type' => 'lock_exam', 'description' => 0],
            ['type' => 'logo', 'description' => ''],
            ['type' => 'next_term_fees_u', 'description' => '25000'],
            ['type' => 'next_term_fees_p', 'description' => '25000'],
        ];

        DB::table('settings')->insert($data);

    }
}
