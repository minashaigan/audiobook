<?php

use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('genres')->insert(['name' => 'genre1']);
        DB::table('genres')->insert(['name' => 'genre2']);
        DB::table('genres')->insert(['name' => 'genre3']);
        DB::table('genres')->insert(['name' => 'genre4']);
        DB::table('genres')->insert(['name' => 'genre5']);

    }
}
