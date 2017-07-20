<?php

use Illuminate\Database\Seeder;

class AuthorTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('author_tag')->insert(['author_id'=>1,'tag_id'=>1]);
        DB::table('author_tag')->insert(['author_id'=>1,'tag_id'=>2]);
        DB::table('author_tag')->insert(['author_id'=>1,'tag_id'=>3]);
        DB::table('author_tag')->insert(['author_id'=>2,'tag_id'=>1]);
        DB::table('author_tag')->insert(['author_id'=>2,'tag_id'=>5]);
    }
}
