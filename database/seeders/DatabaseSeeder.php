<?php

namespace Database\Seeders;

use App\Models\PurchaseAvatars;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FieldOfWorkSeeder::class,
            UserSeeder::class,
            UserFieldSeeder::class,
            AvatarSeeder::class,
            PurchaseAvatarSeeder::class,
            WishlistSeeder::class
        ]);
    }
}
