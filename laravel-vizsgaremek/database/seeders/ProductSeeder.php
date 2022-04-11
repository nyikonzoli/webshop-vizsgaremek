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
            'description' => '',
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
            'description' => '',
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
            'name' => 'Unisex Belt bag',
            'description' => '',
            'price' => 23.78,
            'size' => 'Adjustable',
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 3,
        ]);

        //Anya
        DB::table('products')->insert([
            'id' => 6,
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
            'id' => 7,
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
            'id' => 8,
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
            'id' => 9,
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
            'id' => 10,
            'name' => '"Autumn Leaves" - Painting',
            'description' => '',
            'price' => 189.99,
            'size' => '70cm x 50cm',
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 5,
        ]);

        //Mama
        DB::table('products')->insert([
            'id' => 2,
            'name' => 'Reversible bucket hat - green and brown',
            'description' => '',
            'price' => 32.99,
            'size' => 'S',
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 3,
        ]);

        //Maradék
        DB::table('products')->insert([
            'id' => 2,
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
            'id' => 2,
            'name' => 'Necklace',
            'description' => '',
            'price' => 32.99,
            'size' => 'S',
            'iced' => false,
            'sold' => false,
            'userId' => 4,
            'categoryId' => 8,
        ]);
    }
}
