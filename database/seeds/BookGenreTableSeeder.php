<?php

use Illuminate\Database\Seeder;

class BookGenreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_genre')->insert(['book_id'=>1,'genre_id'=>1]);
        DB::table('book_genre')->insert(['book_id'=>1,'genre_id'=>2]);
        DB::table('book_genre')->insert(['book_id'=>1,'genre_id'=>3]);
        DB::table('book_genre')->insert(['book_id'=>2,'genre_id'=>1]);
        DB::table('book_genre')->insert(['book_id'=>2,'genre_id'=>5]);
    }
}
