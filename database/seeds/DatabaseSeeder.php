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
        $this->call(UserGetBookTableSeeder::class);
        $this->call(UserGenreTableSeeder::class);
        $this->call(UserHasSubscriptionTableSeeder::class);
        $this->call(UserReviewBookTableSeeder::class);
        $this->call(UserReviewAuthorTableSeeder::class);
        $this->call(UserReviewNarratorTableSeeder::class);
        $this->call(BookTagTableSeeder::class);
        $this->call(BookAuthorTableSeeder::class);
        $this->call(BookNarratorTableSeeder::class);
        $this->call(AuthorTagTableSeeder::class);
        $this->call(BookGenreTableSeeder::class);
        $this->call(AuthorGenreTableSeeder::class);
        $this->call(NarratorGenreTableSeeder::class);
        $this->call(NarratorTagTableSeeder::class);
    }
}
