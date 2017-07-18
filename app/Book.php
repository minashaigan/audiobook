<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'time', 'page_number', 'publisher', 'audio_publisher', 'publish_year', 'audio_publish_year',
        'language', 'summary', 'file', 'image'
    ];
    /**
     * Get the sections for the book.
     */
    public function sections()
    {
        return $this->hasMany('App\Section', 'book_id');
    }
    /**
     * The users that buy to the book.
     */
    public function users()
    {
        return $this->belongsToMany('App\User', 'user_get_book', 'book_id', 'user_id');
    }
    /**
     * The reviews of the book.
     */
    public function reviews()
    {
        return $this->belongsToMany('App\User', 'user_review_book', 'book_id', 'user_id')
        ->withPivot('commetn','rate','enable')
            ->withTimestamps();
    }
    /**
     * The authors of the book.
     */
    public function authors()
    {
        return $this->belongsToMany('App\Author', 'book_author', 'book_id', 'author_id');
    }
    /**
     * The narrators of the book.
     */
    public function narrators()
    {
        return $this->belongsToMany('App\Narrator', 'book_narrator', 'book_id', 'narrator_id');
    }
    /**
     * The tags of the book.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'book_tag', 'book_id', 'tag_id');
    }
    /**
     * The genres of the book.
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'book_genre', 'book_id', 'genre_id');
    }
}
