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
            'profilePictureURI' => asset('profile_pictures/fd.jpg')
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Mónika Uglár',
            'email' => 'mu@gmail.com',
            'password' => Hash::make('password'),
            'address' => '4969 Tisztaberek, Apor Péter u. 90.',
            'birthdate' => Carbon::parse('1975-05-23'),
            'profilePictureURI' => asset('profile_pictures/um.jpg')
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Ilona Uglár',
            'email' => 'iu@example.com',
            'password' => Hash::make('password'),
            'address' => '7097 Nagyszokoly, Tas vezér u. 74.',
            'birthdate' => Carbon::parse('1949-09-24'),
            'profilePictureURI' => asset('profile_pictures/iu.jpg')
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Zoltán Nyikon',
            'email' => 'nyikon.zoli@gmail.com',
            'password' => Hash::make('password'),
            'address' => '1042 Budapest, Rózsa utca 6.',
            'birthdate' => Carbon::parse('2002-09-02'),
            'profilePictureURI' => asset('profile_pictures/nyz.jpg')
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
