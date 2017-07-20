<?php

use Illuminate\Database\Seeder;

class NarratorTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('narrator_tag')->insert(['narrator_id'=>1,'tag_id'=>1]);
        DB::table('narrator_tag')->insert(['narrator_id'=>1,'tag_id'=>2]);
        DB::table('narrator_tag')->insert(['narrator_id'=>1,'tag_id'=>3]);
        DB::table('narrator_tag')->insert(['narrator_id'=>2,'tag_id'=>1]);
        DB::table('narrator_tag')->insert(['narrator_id'=>2,'tag_id'=>5]);
    }
}
