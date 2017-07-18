<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'introduction', 'birth_date', 'death_date', 'image', 'nation'
    ];
    /**
     * The books that belong to the author.
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_author', 'author_id', 'book_id');
    }
    /**
     * The genres that belong to the author.
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'author_genre', 'author_id', 'genre_id');
    }
    /**
     * The reviews of the author.
     */
    public function reviews()
    {
        return $this->belongsToMany('App\User', 'user_review_author', 'author_id', 'user_id')
        ->withPivot('commetn','rate','enable')
            ->withTimestamps();
    }
    /**
     * The tags of the author.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'author_tag', 'author_id', 'tag_id');
    }
}