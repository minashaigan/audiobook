<?php

use Illuminate\Database\Seeder;

class UserReviewNarratorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_review_narrator')->insert(['user_id'=>1,'narrator_id'=>3,'comment'=>'co1']);
        DB::table('user_review_narrator')->insert(['user_id'=>1,'narrator_id'=>4,'comment'=>'co2','rate'=>2]);
        DB::table('user_review_narrator')->insert(['user_id'=>2,'narrator_id'=>5,'comment'=>'co3','rate'=>3]);
        DB::table('user_review_narrator')->insert(['user_id'=>2,'narrator_id'=>3,'comment'=>'co4']);
        DB::table('user_review_narrator')->insert(['user_id'=>2,'narrator_id'=>2,'comment'=>'co5']);
    }
}
