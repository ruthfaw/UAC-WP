<?php

namespace Database\Seeders;

use App\Models\PurchaseAvatar;
use Illuminate\Database\Seeder;

class PurchaseAvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PurchaseAvatar::insert([
            [
                'user_id' => '1',
                'avatar_id' => '1'
            ],
            [
                'user_id' => '1',
                'avatar_id' => '2'
            ],
            [
                'user_id' => '1',
                'avatar_id' => '3'
            ],
            [
                'user_id' => '1',
                'avatar_id' => '4'
            ],
            [
                'user_id' => '1',
                'avatar_id' => '5'
            ],
            [
                'user_id' => '2',
                'avatar_id' => '6'
            ],
            [
                'user_id' => '2',
                'avatar_id' => '7'
            ],
            [
                'user_id' => '2',
                'avatar_id' => '8'
            ],
            [
                'user_id' => '2',
                'avatar_id' => '9'
            ],
            [
                'user_id' => '2',
                'avatar_id' => '10'
            ],
        ]);
    }
}
