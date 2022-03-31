<?php

namespace Database\Seeders;

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
            //ConversationSeeder::class,
            TransactionSeeder::class,
            FavouriteSeeder::class,
            CategorySeeder::class,
            MessageSeeder::class,
            ProductSeeder::class,
            ReviewSeeder::class,
            ImageSeeder::class,
            UserSeeder::class,
        ]);
    }
}
