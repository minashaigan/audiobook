<?php

use Illuminate\Database\Seeder;

class NarratorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('narrators')->insert(['name' => 'narrator1']);
        DB::table('narrators')->insert(['name' => 'narrator2','introduction'=>'intro1']);
    }
}
