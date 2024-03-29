<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\StudentRecord;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class StudentRecordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->createStudentRecord();
        $this->createManyStudentRecords(3);
    }

    protected function createManyStudentRecords(int $count)
    {
        $sections = Section::all();

        foreach ($sections as $section){
          User::factory()
                ->has(
                    StudentRecord::factory()
                    ->state([
                    'section_id' => $section->id,
                    'my_class_id' => $section->my_class_id,
                    //'adm_no' =>random_int(100000, 999999),
                    //'adm_no' => mt_rand(100000, 99999999),
                    'user_id' => function(User $user){
                        return ['user_id' => $user->id];
                    },
                ]), 'student_record')
                ->count($count)
                ->create([
                    'user_type' => 'student',
                    'password' => Hash::make('student'),
                ]);
        }

    }

    protected function createStudentRecord()
    {
        $section = Section::first();

        $user = User::factory()->create([
            'name' => 'Student',
            'user_type' => 'student',
            'username' => 'student',
            'gender' => 'male',
            'password' => Hash::make('universitystate'),
            'email' => 'student@student.com',

        ]);

        StudentRecord::factory()->create([
            'my_class_id' => $section->my_class_id,
            'user_id' => $user->id,
            'section_id' => $section->id
        ]);
    }
}
