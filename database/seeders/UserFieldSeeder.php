<?php

namespace Database\Seeders;

use App\Models\UserField;
use Illuminate\Database\Seeder;

class UserFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserField::insert([
            [
                'user_id' => 1,
                'field_of_work_id' => 1
            ],
            [
                'user_id' => 1,
                'field_of_work_id' => 2
            ],
            [
                'user_id' => 1,
                'field_of_work_id' => 3
            ],
            [
                'user_id' => 2,
                'field_of_work_id' => 4
            ],
            [
                'user_id' => 2,
                'field_of_work_id' => 6
            ],
            [
                'user_id' => 2,
                'field_of_work_id' => 7
            ],
            [
                'user_id' => 3,
                'field_of_work_id' => 3
            ],
            [
                'user_id' => 3,
                'field_of_work_id' => 4
            ],
            [
                'user_id' => 3,
                'field_of_work_id' => 6
            ],
            [
                'user_id' => 4,
                'field_of_work_id' => 11
            ],
            [
                'user_id' => 4,
                'field_of_work_id' => 9
            ],
            [
                'user_id' => 4,
                'field_of_work_id' => 5
            ],
            [
                'user_id' => 5,
                'field_of_work_id' => 10
            ],
            [
                'user_id' => 5,
                'field_of_work_id' => 8
            ],
            [
                'user_id' => 5,
                'field_of_work_id' => 12
            ],
            [
                'user_id' => 6,
                'field_of_work_id' => 11
            ],
            [
                'user_id' => 6,
                'field_of_work_id' => 12
            ],
            [
                'user_id' => 6,
                'field_of_work_id' => 3
            ],
            [
                'user_id' => 7,
                'field_of_work_id' => 8
            ],
            [
                'user_id' => 7,
                'field_of_work_id' => 6
            ],
            [
                'user_id' => 7,
                'field_of_work_id' => 5
            ],
            [
                'user_id' => 8,
                'field_of_work_id' => 8
            ],
            [
                'user_id' => 8,
                'field_of_work_id' => 7
            ],
            [
                'user_id' => 8,
                'field_of_work_id' => 12
            ]
        ]);
    }
}
