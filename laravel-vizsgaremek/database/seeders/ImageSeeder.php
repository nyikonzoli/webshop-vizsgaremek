<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert([
            'id' => 1,
            'productId' => 1,
            'imageURI' => asset('products/black-hat-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 2,
            'productId' => 1,
            'imageURI' => asset('products/black-hat-4.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 3,
            'productId' => 1,
            'imageURI' => asset('products/black-hat-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 69,
            'productId' => 1,
            'imageURI' => asset('products/black-hat-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 4,
            'productId' => 2,
            'imageURI' => asset('products/crop-hat-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 5,
            'productId' => 2,
            'imageURI' => asset('products/crop-hat-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 6,
            'productId' => 2,
            'imageURI' => asset('products/crop-hat-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 7,
            'productId' => 3,
            'imageURI' => asset('products/mushroom-box-4.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 8,
            'productId' => 3,
            'imageURI' => asset('products/mushroom-box-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 9,
            'productId' => 3,
            'imageURI' => asset('products/mushroom-box-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 10,
            'productId' => 3,
            'imageURI' => asset('products/mushroom-box-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 11,
            'productId' => 4,
            'imageURI' => asset('products/big-red-box-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 12,
            'productId' => 4,
            'imageURI' => asset('products/big-red-box-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 13,
            'productId' => 4,
            'imageURI' => asset('products/big-red-box-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 14,
            'productId' => 5,
            'imageURI' => asset('products/bum-bag-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 15,
            'productId' => 5,
            'imageURI' => asset('products/bum-bag-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 16,
            'productId' => 5,
           'imageURI' => asset('products/bum-bag-4.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 17,
            'productId' => 5,
            'imageURI' => asset('products/bum-bag-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 18,
            'productId' => 6,
            'imageURI' => asset('products/red-bag-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 19,
            'productId' => 6,
            'imageURI' => asset('products/red-bag-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 20,
            'productId' => 6,
            'imageURI' => asset('products/red-bag-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 21,
            'productId' => 6,
            'imageURI' => asset('products/red-bag-4.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 22,
            'productId' => 7,
            'imageURI' => asset('products/purple-dream-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 23,
            'productId' => 7,
            'imageURI' => asset('products/purple-dream-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 24,
            'productId' => 7,
            'imageURI' => asset('products/purple-dream-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 25,
            'productId' => 7,
            'imageURI' => asset('products/purple-dream-4.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 26,
            'productId' => 8,
            'imageURI' => asset('products/arctic-angel-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 27,
            'productId' => 8,
            'imageURI' => asset('products/arctic-angel-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 28,
            'productId' => 8,
            'imageURI' => asset('products/arctic-angel-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 29,
            'productId' => 9,
            'imageURI' => asset('products/spiral-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 30,
            'productId' => 9,
            'imageURI' => asset('products/spiral-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 70,
            'productId' => 9,
            'imageURI' => asset('products/spiral-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 31,
            'productId' => 10,
            'imageURI' => asset('products/donut-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 32,
            'productId' => 10,
            'imageURI' => asset('products/donut-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 33,
            'productId' => 10,
            'imageURI' => asset('products/donut-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 34,
            'productId' => 11,
            'imageURI' => asset('products/orange-stuff-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 35,
            'productId' => 11,
            'imageURI' => asset('products/orange-stuff-2.jpg'),
        ]);
         DB::table('images')->insert([
            'id' => 36,
            'productId' => 11,
            'imageURI' => asset('products/orange-stuff-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 37,
            'productId' => 12,
            'imageURI' => asset('products/small-red-box-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 38,
            'productId' => 12,
            'imageURI' => asset('products/small-red-box-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 39,
            'productId' => 12,
            'imageURI' => asset('products/small-red-box-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 40,
            'productId' => 12,
            'imageURI' => asset('products/small-red-box-4.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 41,
            'productId' => 13,
            'imageURI' => asset('products/purple-box-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 42,
            'productId' => 13,
            'imageURI' => asset('products/purple-box-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 43,
            'productId' => 13,
            'imageURI' => asset('products/purple-box-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 44,
            'productId' => 14,
            'imageURI' => asset('products/blue-box-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 45,
            'productId' => 14,
            'imageURI' => asset('products/blue-box-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 46,
            'productId' => 14,
            'imageURI' => asset('products/blue-box-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 47,
            'productId' => 15,
            'imageURI' => asset('products/waterfall-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 48,
            'productId' => 15,
            'imageURI' => asset('products/waterfall-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 49,
            'productId' => 15,
            'imageURI' => asset('products/waterfall-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 50,
            'productId' => 16,
            'imageURI' => asset('products/winter-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 51,
            'productId' => 16,
            'imageURI' => asset('products/winter-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 52,
            'productId' => 16,
            'imageURI' => asset('products/winter-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 53,
            'productId' => 17,
            'imageURI' => asset('products/castle-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 54,
            'productId' => 17,
            'imageURI' => asset('products/castle-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 55,
            'productId' => 17,
            'imageURI' => asset('products/castle-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 56,
            'productId' => 18,
            'imageURI' => asset('products/boat-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 57,
            'productId' => 18,
            'imageURI' => asset('products/boat-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 58,
            'productId' => 18,
            'imageURI' => asset('products/boat-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 59,
            'productId' => 19,
            'imageURI' => asset('products/northern-lights-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 60,
            'productId' => 19,
            'imageURI' => asset('products/northern-lights-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 61,
            'productId' => 19,
            'imageURI' => asset('products/northern-lights-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 62,
            'productId' => 20,
            'imageURI' => asset('products/beach-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 63,
            'productId' => 20,
            'imageURI' => asset('products/beach-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 64,
            'productId' => 21,
            'imageURI' => asset('products/earrings-3.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 65,
            'productId' => 21,
            'imageURI' => asset('products/earrings-2.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 66,
            'productId' => 21,
            'imageURI' => asset('products/earrings-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 67,
            'productId' => 22,
            'imageURI' => asset('products/necklace-1.jpg'),
        ]);
        DB::table('images')->insert([
            'id' => 68,
            'productId' => 22,
            'imageURI' => asset('products/necklace-2.jpg'),
        ]);

    }
}
