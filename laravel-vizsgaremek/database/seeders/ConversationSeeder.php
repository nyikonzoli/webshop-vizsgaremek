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
            'user1Id' => 1,
            'user2Id' => 2,
        ]);
        DB::table('conversations')->insert([
            'id' => 2,
            'user1Id' => 1,
            'user2Id' => 3,
        ]);
        DB::table('conversations')->insert([
            'id' => 3,
            'user1Id' => 3,
            'user2Id' => 5,
        ]);
        DB::table('conversations')->insert([
            'id' => 4,
            'user1Id' => 4,
            'user2Id' => 2,
        ]);
    }
}
