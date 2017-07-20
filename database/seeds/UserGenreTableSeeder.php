<?php

use Illuminate\Database\Seeder;

class UserGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_genre')->insert(['user_id'=>1,'genre_id'=>1]);
        DB::table('user_genre')->insert(['user_id'=>1,'genre_id'=>2]);
        DB::table('user_genre')->insert(['user_id'=>1,'genre_id'=>3]);
        DB::table('user_genre')->insert(['user_id'=>2,'genre_id'=>1]);
        DB::table('user_genre')->insert(['user_id'=>2,'genre_id'=>5]);
    }
}
