<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'id' => 1,
            'user1Id' => 1,
            'user2Id' => 3,
        ]);
        DB::table('conversations')->insert([
            'id' => 1,
            'user1Id' => 3,
            'user2Id' => 5,
        ]);
        DB::table('conversations')->insert([
            'id' => 1,
            'user1Id' => 4,
            'user2Id' => 2,
        ]);
    }
}
