<?php

use Illuminate\Database\Seeder;

class BookTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('book_tag')->insert(['book_id'=>1,'tag_id'=>1]);
        DB::table('book_tag')->insert(['book_id'=>1,'tag_id'=>2]);
        DB::table('book_tag')->insert(['book_id'=>1,'tag_id'=>3]);
        DB::table('book_tag')->insert(['book_id'=>2,'tag_id'=>1]);
        DB::table('book_tag')->insert(['book_id'=>2,'tag_id'=>5]);
    }
}
