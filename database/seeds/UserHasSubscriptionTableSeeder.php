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
        DB::table('user_has_subscription')->insert(['user_id'=>1,'subscription_id'=>1]);
        DB::table('user_has_subscription')->insert(['user_id'=>1,'subscription_id'=>2]);
        DB::table('user_has_subscription')->insert(['user_id'=>1,'subscription_id'=>3]);
        DB::table('user_has_subscription')->insert(['user_id'=>2,'subscription_id'=>1]);
        DB::table('user_has_subscription')->insert(['user_id'=>2,'subscription_id'=>5]);
    }
}
