<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamRecordsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'End of 1st Semester Exam', 'term' => '1', 'year' => '2018-2019'],
        ];
        DB::table('exam_records')->insert($data);
    }
}
