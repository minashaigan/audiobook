<?php

use Illuminate\Database\Seeder;

class UserHasSubscriptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_has_subscription')->insert(['user_id'=>1,'subscription_id'=>1,'created_at'=>'2017-08-31 00:00:00','paid'=>1]);
        DB::table('user_has_subscription')->insert(['user_id'=>1,'subscription_id'=>2,'created_at'=>'2017-08-31 00:00:00','paid'=>1]);
        DB::table('user_has_subscription')->insert(['user_id'=>1,'subscription_id'=>3,'created_at'=>'2017-08-31 00:00:00']);
        DB::table('user_has_subscription')->insert(['user_id'=>2,'subscription_id'=>1,'created_at'=>'2017-08-31 00:00:00','paid'=>1]);
        DB::table('user_has_subscription')->insert(['user_id'=>2,'subscription_id'=>5,'created_at'=>'2017-08-31 00:00:00']);
    }
}
