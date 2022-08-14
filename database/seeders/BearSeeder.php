<?php

namespace Database\Seeders;

use App\Models\Bear;
use Illuminate\Database\Seeder;

class BearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bear::insert([
            [
                'bear_image' => 'Grizzly.jpg'
            ],
            [
                'bear_image' => 'IceBear.jpg'
            ],
            [
                'bear_image' => 'Panda.jpg'
            ]
        ]);
    }
}
