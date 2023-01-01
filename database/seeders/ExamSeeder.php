<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            //['name' => 'accountant', 'term' => 'Accountant']
        ];
        DB::table('exams')->insert($data);
    }
}
