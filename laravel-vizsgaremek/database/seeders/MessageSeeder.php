<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Conversation 1
        DB::table('messages')->insert([
            'id' => 1,
            'conversationId' => 1,
            'content' => 'Hi',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 1,
        ]);
        DB::table('messages')->insert([
            'id' => 2,
            'conversationId' => 1,
            'content' => 'Hey',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 2,
        ]);
        DB::table('messages')->insert([
            'id' => 3,
            'conversationId' => 1,
            'content' => 'Sup?',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 2,
        ]);

        //Conversation 2
        DB::table('messages')->insert([
            'id' => 4,
            'conversationId' => 2,
            'content' => 'Hi',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 1,
        ]);
        DB::table('messages')->insert([
            'id' => 5,
            'conversationId' => 2,
            'content' => 'Hey',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 2,
        ]);
        DB::table('messages')->insert([
            'id' => 6,
            'conversationId' => 2,
            'content' => 'I would like to ask you about a product',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 2,
        ]);
        
        //Conversation 3
        DB::table('messages')->insert([
            'id' => 7,
            'conversationId' => 3,
            'content' => 'Hey',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 3,
        ]);
        DB::table('messages')->insert([
            'id' => 8,
            'conversationId' => 3,
            'content' => 'Can you do it for 250$?',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 3,
        ]);
        DB::table('messages')->insert([
            'id' => 9,
            'conversationId' => 3,
            'content' => 'Hi',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 5,
        ]); 
        DB::table('messages')->insert([
            'id' => 10,
            'conversationId' => 3,
            'content' => 'Nope',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 5,
        ]);   

        //Conversation 4
        DB::table('messages')->insert([
            'id' => 11,
            'conversationId' => 4,
            'content' => 'Hey',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 4,
        ]);
        DB::table('messages')->insert([
            'id' => 12,
            'conversationId' => 4,
            'content' => 'Nice guitar',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 4,
        ]);
        DB::table('messages')->insert([
            'id' => 13,
            'conversationId' => 4,
            'content' => 'Thanks',
            'date' => Carbon::parse('2222-01-01'),
            'userId' => 2,
        ]); 
    }
}
