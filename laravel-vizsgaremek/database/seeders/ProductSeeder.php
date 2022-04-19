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
            'description' => "This is a stylish hat, that was carefully designed and made. It ideal for a colder day during the summer or during the fall, or the spring. It is made out of reused denim material, which makes it durable.",
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
            'description' => "I really like this hat because you can wear both sides of it. So basically it's a 2 for 1 deal. It is made out corduroy and it makes it thick and dense. So it's ideal for colder days.",
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
            'description' => "I originally created this item for someone as a present but she didn't like it so here I am, putting it on sale. It is made out of pine wood and the painting is a special painting for wood. It's ideal for storing jewelry or some little stuff.",
            'price' => 9.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 1,
            'categoryId' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 4,
            'name' => 'Large jewelry box',
            'description' => "This box was made out of pine wood. It was a bit boring so I decided to make a design for it and paint. It turned out so great that I uploaded it here for sale. The painting on the wood is specially designed for wood, so it will look great for a long time.",
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
            'description' => "What I really like about this bag is that it's unisex, so no matter who you are, it will look great on you. The body of the bag is made out of denim material so it's extremly durable. The strap is from a reused FILA bag, so it's also good quailty.",
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
            'description' => "Like many of my products it was also made out of denim. I chose 2 different colours and it turned out amazing. The inside was made out of waterproof material so your valuables will be protected from the outside world.",
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
            'description' => "Like many of my paintings this was made with a special matte paint. It's a bit shiney but it looks amazing in a bright room. I can be a great centerpiece in a place.",
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
            'description' => "This painting is my all time favourite. It's unique because eveeryone sees something different in the painting. One sees a white dove, others see and angel or the arctic ice. It was made with a pouring technique.",
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
            'description' => "This painting took a long time to make because of the huge amount of small dots that I had to place by hand one by one. It required a lot a patience, but it way worth it because it turned out so great. It was created with a matte paint.",
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
            'description' => "The closest thing to what this paintings represents is a donut. I tried to come up with something more creative but it is what it is. This was made with a reflective, shiney matte paint. Because it's size, it perfectly fits in the middle of bigger area.",
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
            'description' => "For some reason this painting alway gives me some autumn vibes, that's why I came up with this name. It is one of my oldest paintings which I'm really proud of. Like most of my paintings it was created with a matte paint. It looks greate in a bit darker room.",
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
            'description' => 'Recently I started to do paintings on little boxes like this one. The box itself is made out of pine wood. I carefully disassmbled the closing mechanism, then sended it and painted it. I used the same paint for it as for my canvas paintings.',
            'price' => 14.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 13,
            'name' => "This is my most recent box paint. As you can see it has a bit more restrained style then the others. It's much more simpler but yet, still amazing. I was also created with matte paint and pine wood.",
            'description' => null,
            'price' => 18.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 7,
        ]);
        DB::table('products')->insert([
            'id' => 14,
            'name' => 'Blue box for decoration',
            'description' => "It's another box paintings that I did. It's a bit similar to the red one so if you don't like the color of one, you can buy the other. I also sendpapered it down like the others, so it has a very smooth finnsih to it. The box itself was made out of pin wood and the paint is a reflective matte paint.",
            'price' => 14.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 2,
            'categoryId' => 7,
        ]);

        //Mama
        DB::table('products')->insert([
            'id' => 15,
            'name' => '"Waterfall" - painting',
            'description' => null,
            'price' => 78.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 16,
            'name' => '"Cold winter" - painting',
            'description' => null,
            'price' => 95.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 17,
            'name' => '"Castle" - painting',
            'description' => null,
            'price' => 63.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 18,
            'name' => '"Boat during sunrise" - painting',
            'description' => null,
            'price' => 149.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 19,
            'name' => '"Northern light" - painting',
            'description' => null,
            'price' => 110.00,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);
        DB::table('products')->insert([
            'id' => 20,
            'name' => '"Sunset on the beach" - painting',
            'description' => null,
            'price' => 78.99,
            'size' => null,
            'iced' => false,
            'sold' => false,
            'userId' => 3,
            'categoryId' => 5,
        ]);

        //Maradék
        DB::table('products')->insert([
            'id' => 21,
            'name' => 'Earrings',
            'description' => null,
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
