<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'id' => 1,
            'sellerId' => 1,
            'buyerId' => 2,
            'content' => null,
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'id' => 2,
            'sellerId' => 1,
            'buyerId' => 3,
            'content' => null,
            'rating' => 2,
        ]);
        DB::table('reviews')->insert([
            'id' => 3,
            'sellerId' => 2,
            'buyerId' => 4,
            'content' => 'Making good products, very much like',
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'id' => 4,
            'sellerId' => 2,
            'buyerId' => 5,
            'content' => 'Did not like product, was broken 1/5',
            'rating' => 1,
        ]);
        DB::table('reviews')->insert([
            'id' => 5,
            'sellerId' => 3,
            'buyerId' => 1,
            'content' => null,
            'rating' => 3,
        ]);
        DB::table('reviews')->insert([
            'id' => 6,
            'sellerId' => 3,
            'buyerId' => 5,
            'content' => 'I like this very much, thank you!!!',
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'id' => 7,
            'sellerId' => 4,
            'buyerId' => 2,
            'content' => null,
            'rating' => 4,
        ]);
        DB::table('reviews')->insert([
            'id' => 8,
            'sellerId' => 4,
            'buyerId' => 3,
            'content' => 'Makes serviceable products',
            'rating' => 2,
        ]);
        DB::table('reviews')->insert([
            'id' => 9,
            'sellerId' => 4,
            'buyerId' => 1,
            'content' => null,
            'rating' => 4,
        ]);
        DB::table('reviews')->insert([
            'id' => 10,
            'sellerId' => 4,
            'buyerId' => 1,
            'content' => null,
            'rating' => 5,
        ]);
        DB::table('reviews')->insert([
            'id' => 11,
            'sellerId' => 4,
            'buyerId' => 5,
            'content' => 'Test',
            'rating' => 5,
        ]);
    }
}
