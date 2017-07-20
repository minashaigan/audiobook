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
        DB::table('narrators')->insert(['name' => 'narrator']);
        DB::table('narrators')->insert(['name' => 'narrator','introduction'=>'intro']);
    }
}
