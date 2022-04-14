<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConversationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('conversations')->insert([
            'id' => 1,
            'buyerId' => 1,
            'sellerId' => 2,
            'productId' => 12,
        ]);
        DB::table('conversations')->insert([
            'id' => 2,
            'buyerId' => 1,
            'sellerId' => 3,
            'productId' => 16,
        ]);
        DB::table('conversations')->insert([
            'id' => 3,
            'buyerId' => 3,
            'sellerId' => 1,
            'productId' => 2,
        ]);
        DB::table('conversations')->insert([
            'id' => 4,
            'buyerId' => 4,
            'sellerId' => 2,
            'productId' => 13,
        ]);
    }
}
