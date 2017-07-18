<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'book1','time'=>'	2 ساعت و 26 دقیقه','publisher'=>'publisher','publish_year'=>1396,'file'=>'kjghkkjsd.pdf']);
    }
}
