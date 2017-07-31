<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookGenre extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_genre';
    /**
     * Get the genre that owns the book.
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre','genre_id');
    }
    /**
     * Get the book that owns the genre.
     */
    public function book()
    {
        return $this->belongsTo('App\Book','book_id');
    }
}
