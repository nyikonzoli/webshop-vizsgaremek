<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'name' => 'Lewin Gedaliah',
            'email' => 'lg@example.com',
            'password' => Hash::make('password'),
            'address' => Str::random(30),
            'birthdate' => Carbon::parse('2000-01-01'),
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Eemeli Nikolina',
            'email' => 'en@example.com',
            'password' => Hash::make('password'),
            'address' => Str::random(30),
            'birthdate' => Carbon::parse('2000-01-01'),
        ]);
        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Adonijah Hormazd',
            'email' => 'ah@example.com',
            'password' => Hash::make('password'),
            'address' => Str::random(30),
            'birthdate' => Carbon::parse('2000-01-01'),
        ]);
        DB::table('users')->insert([
            'id' => 4,
            'name' => 'Basia Tamar',
            'email' => 'bt@example.com',
            'password' => Hash::make('password'),
            'address' => Str::random(30),
            'birthdate' => Carbon::parse('2000-01-01'),
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
