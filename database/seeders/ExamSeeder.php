<?php

namespace Database\Seeders;

use App\Helpers\Qs;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            ['name' => 'End of 1st Semester Exam', 'term' => '1', 'year' => '2018-2019'],
            ['name' => 'End of 2nd Semester Exam', 'term' => '2', 'year' => '2018-2019'],
            ['name' => 'End of 3rd Semester Exam', 'term' => '3', 'year' => '2018-2019'],
            ['name' => 'End of 1st Semester Exam', 'term' => '1', 'year' => '2019-2020'],
            ['name' => 'End of 2nd Semester Exam', 'term' => '2', 'year' => '2019-2020'],
            ['name' => 'End of 3rd Semester Exam', 'term' => '3', 'year' => '2019-2020'],
            ['name' => 'End of 1st Semester Exam', 'term' => '1', 'year' => '2020-2021'],
            ['name' => 'End of 2nd Semester Exam', 'term' => '2', 'year' => '2020-2021'],
            ['name' => 'End of 3rd Semester Exam', 'term' => '3', 'year' => '2020-2021'],
            ['name' => 'End of 1st Semester Exam', 'term' => '1', 'year' => '2021-2022'],
            ['name' => 'End of 2nd Semester Exam', 'term' => '2', 'year' => '2021-2022'],
            ['name' => 'End of 3rd Semester Exam', 'term' => '3', 'year' => '2021-2022'],
            ['name' => 'End of 1st Semester Exam', 'term' => '1', 'year' => Qs::getSetting('current_session')],
            ['name' => 'End of 2nd Semester Exam', 'term' => '2', 'year' => Qs::getSetting('current_session')],
            ['name' => 'End of 3rd Semester Exam', 'term' => '3', 'year' => Qs::getSetting('current_session')],
        ];
        DB::table('exams')->insert($data);
    }
}
