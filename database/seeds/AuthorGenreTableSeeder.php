<?php

use Illuminate\Database\Seeder;

class AuthorGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_genre')->insert(['author_id'=>1,'genre_id'=>1]);
        DB::table('author_genre')->insert(['author_id'=>1,'genre_id'=>2]);
        DB::table('author_genre')->insert(['author_id'=>1,'genre_id'=>3]);
        DB::table('author_genre')->insert(['author_id'=>2,'genre_id'=>1]);
        DB::table('author_genre')->insert(['author_id'=>2,'genre_id'=>5]);
    }
}
