<?php

use Illuminate\Database\Seeder;

class UserReviewAuthorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_review_author')->insert(['user_id'=>1,'author_id'=>1,'comment'=>'co1']);
        DB::table('user_review_author')->insert(['user_id'=>1,'author_id'=>2,'comment'=>'co2','rate'=>2]);
        DB::table('user_review_author')->insert(['user_id'=>2,'author_id'=>3,'comment'=>'co3','rate'=>3]);
        DB::table('user_review_author')->insert(['user_id'=>2,'author_id'=>1,'comment'=>'co4']);
        DB::table('user_review_author')->insert(['user_id'=>2,'author_id'=>5,'comment'=>'co5']);
    }
}
