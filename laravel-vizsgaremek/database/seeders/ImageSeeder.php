<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Dorina
        DB::table('images')->insert([
            'id' => 1,
            'productId' => 1,
            'imageURI' => 'products/black-hat-1.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 2,
            'productId' => 1,
            'imageURI' => 'products/black-hat-2.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 3,
            'productId' => 1,
            'imageURI' => 'products/black-hat-3.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 4,
            'productId' => 1,
            'imageURI' => 'products/black-hat-4.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 5,
            'productId' => 2,
            'imageURI' => 'products/crop-hat-1.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 6,
            'productId' => 2,
            'imageURI' => 'products/crop-hat-2.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 7,
            'productId' => 2,
            'imageURI' => 'products/crop-hat-3.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 8,
            'productId' => 3,
            'imageURI' => 'products/mushroom-box-1.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 9,
            'productId' => 3,
            'imageURI' => 'products/mushroom-box-2.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 10,
            'productId' => 3,
            'imageURI' => 'products/mushroom-box-3.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 11,
            'productId' => 3,
            'imageURI' => 'products/mushroom-box-4.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 12,
            'productId' => 4,
            'imageURI' => 'products/purple-box-1.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 13,
            'productId' => 4,
            'imageURI' => 'products/purple-box-2.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 14,
            'productId' => 4,
            'imageURI' => 'products/purple-box-3.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 15,
            'productId' => 5,
            'imageURI' => 'products/bum-bag-1.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 16,
            'productId' => 5,
            'imageURI' => 'products/bum-bag-2.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 17,
            'productId' => 5,
            'imageURI' => 'products/bum-bag-3.jpg'
        ]);
        DB::table('images')->insert([
            'id' => 18,
            'productId' => 5,
            'imageURI' => 'products/bum-bag-4.jpg'
        ]);
    }
}
