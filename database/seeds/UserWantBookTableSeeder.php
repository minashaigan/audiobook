<?php

use Illuminate\Database\Seeder;

class UserWantBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_want_book')->insert(['user_id'=>1,'book_id'=>1]);
        DB::table('user_want_book')->insert(['user_id'=>1,'book_id'=>2]);
        DB::table('user_want_book')->insert(['user_id'=>1,'book_id'=>3]);
        DB::table('user_want_book')->insert(['user_id'=>2,'book_id'=>1]);
        DB::table('user_want_book')->insert(['user_id'=>2,'book_id'=>5]);
    }
}
