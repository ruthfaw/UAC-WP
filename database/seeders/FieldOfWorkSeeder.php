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
