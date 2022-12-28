<?php

namespace Database\Seeders;

use App\Models\MyClass;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->delete();

        $this->createSubjects();
    }

    protected function createSubjects()
    {
        $subjects = ['Computer Science', 'Commerce', 'Business Information Technology', 'Law', 'International Studies', 'Financial Engineering', 'Acturial Science', 'Financial Economics', 'Communication', 'Tourism Management', 'Hospitality Management', 'Telecommunications'];
        $sub_slug = ['BICS', 'BCOM', 'BBIT', 'BLW', 'BIS', 'FENG', 'BAS', 'BFE', 'BAC', 'BTM', 'BHM', 'BST'];
        $teacher_id = User::where(['user_type' => 'teacher'])->first()->id;
        $my_classes = MyClass::all();

        foreach ($my_classes as $my_class) {

            $data = [

                [
                    'name' => $subjects[0],
                    'slug' => $sub_slug[0],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

                [
                    'name' => $subjects[1],
                    'slug' => $sub_slug[1],
                    'my_class_id' => $my_class->id,
                    'teacher_id' => $teacher_id
                ],

            ];

            DB::table('subjects')->insert($data);
        }

    }

}
