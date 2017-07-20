<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(AuthorsTableSeeder::class);
        $this->call(NarratorsTableSeeder::class);
        $this->call(GenresTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(DiscountsTableSeeder::class);
        $this->call(SubscriptionsTableSeeder::class);
        $this->call(UserWantBookTableSeeder::class);
    }
}
