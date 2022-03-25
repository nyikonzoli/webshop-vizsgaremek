<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => "Instruments"
        ]);
        DB::table('categories')->insert([
            'id' => 2,
            'name' => "Toys"
        ]);
        DB::table('categories')->insert([
            'id' => 3,
            'name' => "Clothes"
        ]);
        DB::table('categories')->insert([
            'id' => 4,
            'name' => "Pins"
        ]);
        DB::table('categories')->insert([
            'id' => 5,
            'name' => "Paintings"
        ]);
        DB::table('categories')->insert([
            'id' => 6,
            'name' => "Statues"
        ]);
        DB::table('categories')->insert([
            'id' => 7,
            'name' => "Decorations"
        ]);
    }
}
