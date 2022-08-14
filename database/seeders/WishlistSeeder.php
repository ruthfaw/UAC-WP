<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Wishlist::insert([
            [
                'user_id' => '1',
                'friend_id' => '2'
            ],
            [
                'user_id' => '1',
                'friend_id' => '3'
            ],
            [
                'user_id' => '4',
                'friend_id' => '1'
            ],
            [
                'user_id' => '5',
                'friend_id' => '1'
            ],
        ]);    
    }
}
