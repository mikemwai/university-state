<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Qs;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $this->createNewUsers();
        $this->createManyUsers( 3);
    }

    protected function createNewUsers()
    {
        $password = Hash::make('universitystate'); // Default user password

        $d = [

            ['name' => 'Super Admin',
                'email' => 'superadmin@superadmin.com',
                'username' => 'superadmin',
                'password' => $password,
                'user_type' => 'super_admin',
                'gender' => 'male',
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Admin KORA',
            'email' => 'admin@admin.com',
            'password' => $password,
            'user_type' => 'admin',
            'username' => 'admin',
            'gender' => 'female',
            'code' => strtoupper(Str::random(10)),
            'remember_token' => Str::random(10),
            ],

            ['name' => 'Teacher Chike',
                'email' => 'teacher@teacher.com',
                'user_type' => 'teacher',
                'username' => 'teacher',
                'gender' => 'female',
                'password' => $password,
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Parent Kaba',
                'email' => 'parent@parent.com',
                'user_type' => 'parent',
                'username' => 'parent',
                'gender' => 'male',
                'password' => $password,
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Accountant Jeff',
                'email' => 'accountant@accountant.com',
                'user_type' => 'accountant',
                'username' => 'accountant',
                'gender' => 'male',
                'password' => $password,
                'code' => strtoupper(Str::random(10)),
                'remember_token' => Str::random(10),
            ],

            ['name' => 'Student Laravel',
            'email' => 'studentlaravel@student.com',
            'user_type' => 'student',
            'username' => 'laravel',
            'gender' => 'female',
            'password' => $password,
            'code' => strtoupper(Str::random(10)),
            'remember_token' => Str::random(10),
        ],
        ];
        DB::table('users')->insert($d);
    }

    protected function createManyUsers(int $count)
    {
        $data = [];
        $user_type = Qs::getAllUserTypes(['super_admin', 'librarian', 'student']);

        for($i = 1; $i <= $count; $i++){

            foreach ($user_type as $k => $ut){

                $data[] = ['name' => ucfirst($user_type[$k]).' '.$i,
                    'email' => $user_type[$k].$i.'@'.$user_type[$k].'.com',
                    'user_type' => $user_type[$k],
                    'username' => $user_type[$k].$i,
                    'password' => Hash::make($user_type[$k]),
                    'code' => strtoupper(Str::random(10)),
                    'remember_token' => Str::random(10),
                ];

            }

        }

        DB::table('users')->insert($data);
    }
}
