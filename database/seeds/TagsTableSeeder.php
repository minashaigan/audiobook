<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tags')->insert(['name' => 'tag1']);
        DB::table('tags')->insert(['name' => 'tag2']);
        DB::table('tags')->insert(['name' => 'tag3']);
        DB::table('tags')->insert(['name' => 'tag4']);
        DB::table('tags')->insert(['name' => 'tag5']);
    }
}
