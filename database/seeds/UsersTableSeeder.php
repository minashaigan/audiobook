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
        DB::table('users')->insert(['name' => 'mina','mobile'=>'09128354865','email'=>'minagan2004@yahoo.com','password'=>'123456','activated'=>'0']);
    }
}
