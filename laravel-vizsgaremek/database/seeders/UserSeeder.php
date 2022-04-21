<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'Dorina Farkas',
            'email' => 'df@gmail.com',
            'password' => Hash::make('password'),
            'address' => '8767 Pötréte, Kálmán Imre u. 80.',
            'birthdate' => Carbon::parse('2003-08-03'),
            'profilePictureURI' => 'profile_pictures/fd.jpg',
            'description' => "Hi! I'm Dorina and a like to create DIY clothes and small jewelry boxes. Most of the time I create my clothes out of denim materials which I usally buy second handed. I enjoy creating products that people can waer and use for many years. If you have any questings about my products, feel free to contect me. :)"
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Mónika Uglár',
            'email' => 'mu@gmail.com',
            'password' => Hash::make('password'),
            'address' => '4969 Tisztaberek, Apor Péter u. 90.',
            'birthdate' => Carbon::parse('1975-05-23'),
            'profilePictureURI' => 'profile_pictures/um.jpg',
            'description' => "Hello, I'm Mónika (Móni for short) and I make paintings on canvases and boxes. I enjoy painting since I was a little kid. I always wanted to become a painter but life had other plans for me. But this site gave me an oportunity to start a career. Feel free to look around!"
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Ilona Uglár',
            'email' => 'iu@example.com',
            'password' => Hash::make('password'),
            'address' => '7097 Nagyszokoly, Tas vezér u. 74.',
            'birthdate' => Carbon::parse('1949-09-24'),
            'profilePictureURI' => 'profile_pictures/ui.jpg',
            'description' => "Hello, I'm Ilona. I'm a retired grandmother who loves makeing paintings all day long during her freetime. I created hundreds of art pieces throuhgout the years and I thought I would sell a few of them. Go ahead and check out my paintings."
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Zoltán Nyikon',
            'email' => 'nyikon.zoli@gmail.com',
            'password' => Hash::make('password'),
            'address' => '1042 Budapest, Rózsa utca 6.',
            'birthdate' => Carbon::parse('2002-09-02'),
            'profilePictureURI' => 'profile_pictures/nyz.jpg',
            'description' => " HI! I'm Zoli and I didn't really make these products. These are just DIY items that I borrowed from some of my friends in hope of that I can make them a few bucks. I would appriciate if you would take a look at these items. Feel free to message me about the products!",
        ]);
        DB::table('users')->insert([
            'id' => 5,
            'name' => 'Hinrik Vissarion',
            'email' => 'hv@example.com',
            'password' => Hash::make('password'),
            'address' => Str::random(30),
            'birthdate' => Carbon::parse('2000-01-01'),
        ]);
    }
}
