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

            /*['exam_id' => '4', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2019-2020'],
            ['exam_id' => '4', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2019-2020'],
            ['exam_id' => '4', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2019-2020'],
            ['exam_id' => '5', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2019-2020'],
            ['exam_id' => '5', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2019-2020'],
            ['exam_id' => '5', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2019-2020'],
            ['exam_id' => '7', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2020-2021'],
            ['exam_id' => '7', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2020-2021'],
            ['exam_id' => '7', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2020-2021'],
            ['exam_id' => '8', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2020-2021'],
            ['exam_id' => '8', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2020-2021'],
            ['exam_id' => '8', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2020-2021'],
            ['exam_id' => '10', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2021-2022'],
            ['exam_id' => '10', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2021-2022'],
            ['exam_id' => '10', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2021-2022'],
            ['exam_id' => '11', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2021-2022'],
            ['exam_id' => '11', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2021-2022'],
            ['exam_id' => '11', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2021-2022'],
            ['exam_id' => '13', 'student_id' => '19', 'my_class_id' => '1', 'section_id' => '1', 'total' => '81', 'ave' => '81', 'class_ave' => '76.5', 'pos' => '2', 'year' => '2022-2023'],
            ['exam_id' => '13', 'student_id' => '20', 'my_class_id' => '1', 'section_id' => '1', 'total' => '69', 'ave' => '69', 'class_ave' => '76.5', 'pos' => '4', 'year' => '2022-2023'],
            ['exam_id' => '13', 'student_id' => '21', 'my_class_id' => '1', 'section_id' => '1', 'total' => '70', 'ave' => '70', 'class_ave' => '76.5', 'pos' => '3', 'year' => '2022-2023'],
            ['exam_id' => '13', 'student_id' => '22', 'my_class_id' => '1', 'section_id' => '1', 'total' => '86', 'ave' => '86', 'class_ave' => '76.5', 'pos' => '1', 'year' => '2022-2023'],
            ['exam_id' => '13', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2022-2023'],
            ['exam_id' => '13', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2022-2023'],
            ['exam_id' => '13', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2022-2023'],
            /*['exam_id' => '14', 'student_id' => '29', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '3', 'year' => '2022-2023'],
            ['exam_id' => '14', 'student_id' => '30', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '2', 'year' => '2022-2023'],
            ['exam_id' => '14', 'student_id' => '31', 'my_class_id' => '4', 'section_id' => '1', 'total' => '74', 'ave' => '74', 'class_ave' => '69.3', 'pos' => '1', 'year' => '2022-2023'],*/

        ];
        DB::table('exam_records')->insert($data);
    }
}
