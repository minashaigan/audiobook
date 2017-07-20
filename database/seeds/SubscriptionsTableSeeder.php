<?php

use Illuminate\Database\Seeder;

class SubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subscriptions')->insert(['type'=>0,'price'=>'100']);
        DB::table('subscriptions')->insert(['type'=>0,'price'=>'200']);
        DB::table('subscriptions')->insert(['type'=>1,'price'=>'300']);
        DB::table('subscriptions')->insert(['type'=>2,'price'=>'400']);
        DB::table('subscriptions')->insert(['type'=>3,'price'=>'500']);
    }
}
