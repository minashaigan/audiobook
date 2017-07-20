<?php

use Illuminate\Database\Seeder;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('authors')->insert(['name' => 'author']);
        DB::table('authors')->insert(['name' => 'author','introduction'=>'intro']);
        DB::table('authors')->insert(['name' => 'author','introduction'=>'intro','birth_date'=>1200]);
        DB::table('authors')->insert(['name' => 'author','introduction'=>'intro','birth_date'=>1300,'death_date'=>1400]);
        DB::table('authors')->insert(['name' => 'author','introduction'=>'intro','birth_date'=>1400,'death_date'=>1500,'nation'=>'nationality']);

    }
}
