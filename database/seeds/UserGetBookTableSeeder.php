<?php

use Illuminate\Database\Seeder;

class UserGetBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_get_book')->insert(['user_id'=>1,'book_id'=>4]);
        DB::table('user_get_book')->insert(['user_id'=>1,'book_id'=>5]);
        DB::table('user_get_book')->insert(['user_id'=>2,'book_id'=>2]);
        DB::table('user_get_book')->insert(['user_id'=>2,'book_id'=>3]);
        DB::table('user_get_book')->insert(['user_id'=>2,'book_id'=>4]);
    }
}
