<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dorina
        DB::table('products')->insert([
            'id' => 1,
            'name' => 'Handmade bucket hat - black',
            'description' => 'farmer',
            'price' => 28.99,
            'size' => 'S',
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Reversible bucket hat - green and brown',
            'description' => 'kord vagy cord anyag',
            'price' => 32.99,
            'size' => 'S',
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 3,
            'name' => 'Jewelry box with mushroom paintings',
            'description' => '',
            'price' => 9.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'name' => 'Large jewelry box',
            'description' => '',
            'price' => 14.99,
            'size' => 'S',
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 5,
            'name' => 'Unisex Bum bag',
            'description' => 'farmer',
            'price' => 23.78,
            'size' => 'Adjustable',
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 3,
        ]);
        DB::table('products')->insert([
            'id' => 6,
            'name' => 'Shopping bag',
            'description' => 'farmer',
            'price' => 41.00,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 3,
        ]);

        //Anya
        DB::table('products')->insert([
            'id' => 7,
            'name' => '"Purple Dream" - Painting',
            'description' => '',
            'price' => 68.82,
            'size' => '30cm x 40cm',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 8,
            'name' => '"Antarctic Angel" - Painting',
            'description' => '',
            'price' => 79.99,
            'size' => '30cm x 30cm',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 9,
            'name' => '"Pink Spiral" - Painting',
            'description' => '',
            'price' => 95.00,
            'size' => '40cm x 40cm',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 10,
            'name' => '"Ornate donut" - Painting',
            'description' => '',
            'price' => 128.00,
            'size' => '50x50',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 11,
            'name' => '"Autumn Leaves" - Painting',
            'description' => '',
            'price' => 189.99,
            'size' => '70cm x 50cm',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 12,
            'name' => 'Red box for decoration',
            'description' => '',
            'price' => 14.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 13,
            'name' => 'Purple jewelry box',
            'description' => '',
            'price' => 18.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 14,
            'name' => 'Blue box,
            'description' => '',
            'price' => 14.99 for decoration',
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 7,
        ]);

        //Mama
        DB::table('products')->insert([
            'id' => 15,
            'name' => '"Waterfall" - painting"',
            'description' => '',
            'price' => 78.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 16,
            'name' => '"Cold winter" - painting"',
            'description' => '',
            'price' => 95.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 17,
            'name' => '"Castle" - painting"',
            'description' => '',
            'price' => 63.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 18,
            'name' => '"Boat during sunrise" - painting"',
            'description' => '',
            'price' => 149.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 19,
            'name' => '"Northern light" - painting"',
            'description' => '',
            'price' => 110.00,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 20,
            'name' => '"Sunset on the beach" - painting"',
            'description' => '',
            'price' => 78.99,
            'size' => '',
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);

        //Maradék
        DB::table('products')->insert([
            'id' => 21,
            'name' => 'Earrings',
            'description' => '',
            'price' => 15.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 4,
            'categoryId' => 8,
        ]);
        DB::table('products')->insert([
            'id' => 22,
            'name' => 'Necklace',
            'description' => 'színezett gyanta',
            'price' => 32.99,
            'size' => 'S',
            'iced' => false,
            'sold' => false,
            'userId' => 4,
            'categoryId' => 8,
        ]);
    }
}
