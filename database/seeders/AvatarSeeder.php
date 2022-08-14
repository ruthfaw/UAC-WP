<?php

namespace Database\Seeders;

use App\Models\Avatar;
use Illuminate\Database\Seeder;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Avatar::insert([
            [
                'image_avatar' => 'avatar1.jpg',
                'name_avatar' => 'Php Girl',
                'price_avatar' => 50
            ],
            [
                'image_avatar' => 'avatar2.jpg',
                'name_avatar' => 'OMG Girl',
                'price_avatar' => 70
            ],
            [
                'image_avatar' => 'avatar3.jpg',
                'name_avatar' => 'Monkey Eat Banana',
                'price_avatar' => 100
            ],
            [
                'image_avatar' => 'avatar4.jpg',
                'name_avatar' => 'Annyeong',
                'price_avatar' => 300
            ],
            [
                'image_avatar' => 'avatar5.jpg',
                'name_avatar' => 'Mad Boy',
                'price_avatar' => 500
            ],
            [
                'image_avatar' => 'avatar6.jpg',
                'name_avatar' => 'Tongue-Out Boy',
                'price_avatar' => 800
            ],
            [
                'image_avatar' => 'avatar7.jpg',
                'name_avatar' => 'Boy Shout Libur',
                'price_avatar' => 1000
            ],
            [
                'image_avatar' => 'avatar8.jpg',
                'name_avatar' => 'Boy Said Yuk',
                'price_avatar' => 5000
            ],
            [
                'image_avatar' => 'avatar9.jpg',
                'name_avatar' => 'Girl Said Rahasia',
                'price_avatar' => 75000
            ],
            [
                'image_avatar' => 'avatar10.jpg',
                'name_avatar' => 'Optimistic Girl',
                'price_avatar' => 100000
            ],
        ]);
    }
}
