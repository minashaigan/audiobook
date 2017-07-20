<?php

use Illuminate\Database\Seeder;

class SectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sections')->insert(['chapter_number' => '1','chapter_name'=>'chap1','book_id'=>'1']);
        DB::table('sections')->insert(['chapter_number' => '2','chapter_name'=>'chap2','book_id'=>'1']);
        DB::table('sections')->insert(['chapter_number' => '3','chapter_name'=>'chap3','book_id'=>'1']);
        DB::table('sections')->insert(['chapter_number' => '4','chapter_name'=>'chap4','book_id'=>'1']);
        DB::table('sections')->insert(['chapter_number' => '5','chapter_name'=>'chap5','book_id'=>'1']);
        DB::table('sections')->insert(['chapter_number' => '1','chapter_name'=>'chap1','book_id'=>'2']);
        DB::table('sections')->insert(['chapter_number' => '2','chapter_name'=>'chap2','book_id'=>'2']);
        DB::table('sections')->insert(['chapter_number' => '3','chapter_name'=>'chap3','book_id'=>'2']);
        DB::table('sections')->insert(['chapter_number' => '4','chapter_name'=>'chap4','book_id'=>'2']);
        DB::table('sections')->insert(['chapter_number' => '5','chapter_name'=>'chap5','book_id'=>'2']);
        DB::table('sections')->insert(['chapter_number' => '1','chapter_name'=>'chap1','book_id'=>'3']);
        DB::table('sections')->insert(['chapter_number' => '2','chapter_name'=>'chap2','book_id'=>'3']);
        DB::table('sections')->insert(['chapter_number' => '3','chapter_name'=>'chap3','book_id'=>'3']);
        DB::table('sections')->insert(['chapter_number' => '4','chapter_name'=>'chap4','book_id'=>'3']);
        DB::table('sections')->insert(['chapter_number' => '5','chapter_name'=>'chap5','book_id'=>'3']);
    }
}
