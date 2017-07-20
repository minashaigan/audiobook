<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(['name' => 'user1','email'=>'user1@yahoo.com','password'=>'123456','activated'=>'1']);
        DB::table('users')->insert(['name' => 'user2','email'=>'user2@yahoo.com','password'=>'123456','activated'=>'0']);
    }
}
