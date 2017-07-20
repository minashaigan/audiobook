<?php

use Illuminate\Database\Seeder;

class NarratorGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('narrator_genre')->insert(['narrator_id'=>1,'genre_id'=>1]);
        DB::table('narrator_genre')->insert(['narrator_id'=>1,'genre_id'=>2]);
        DB::table('narrator_genre')->insert(['narrator_id'=>1,'genre_id'=>3]);
        DB::table('narrator_genre')->insert(['narrator_id'=>2,'genre_id'=>1]);
        DB::table('narrator_genre')->insert(['narrator_id'=>2,'genre_id'=>5]);
    }
}
