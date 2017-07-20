<?php

use Illuminate\Database\Seeder;

class UserReviewBookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_review_book')->insert(['user_id'=>1,'book_id'=>4,'comment'=>'co1']);
        DB::table('user_review_book')->insert(['user_id'=>1,'book_id'=>5,'comment'=>'co2','rate'=>3]);
        DB::table('user_review_book')->insert(['user_id'=>2,'book_id'=>2,'comment'=>'co3','rate'=>4]);
        DB::table('user_review_book')->insert(['user_id'=>2,'book_id'=>3,'comment'=>'co4']);
        DB::table('user_review_book')->insert(['user_id'=>2,'book_id'=>4,'comment'=>'co5']);
    }
}
