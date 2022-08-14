<?php

namespace Database\Seeders;

use App\Models\FieldOfWork;
use Illuminate\Database\Seeder;

class FieldOfWorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::insert([
        //     [
        //         'role_id' => 1,
        //         'name' => 'Admin 1',
        //         'email' => 'Admin1@test.com',
        //         'password' => Hash::make('Admin123')
        //     ],
        //     [
        //         'role_id' => 2,
        //         'name' => 'User 1',
        //         'email' => 'User1@test.com',
        //         'password' => Hash::make('User123')
        //     ]
        // ]);

        FieldOfWork::insert([
            [
                'field_name' => 'Computer Science'
            ],
            [
                'field_name' => 'Information System'
            ],
            [
                'field_name' => 'Business Analyst'
            ],
            [
                'field_name' => 'Accounting'
            ],
            [
                'field_name' => 'Product Development'
            ],
            [
                'field_name' => 'Economy Management'
            ],
            [
                'field_name' => 'Relationship Building'
            ],
            [
                'field_name' => 'Legalty'
            ],
            [
                'field_name' => 'Design Product'
            ],
            [
                'field_name' => 'Medical'
            ],
            [
                'field_name' => 'Engineering'
            ],
            [
                'field_name' => 'Others'
            ],
        ]);
    }
}
