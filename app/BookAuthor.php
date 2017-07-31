<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookAuthor extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_author';
    /**
     * Get the author that owns the book.
     */
    public function author()
    {
        return $this->belongsTo('App\Author','author_id');
    }
    /**
     * Get the book that owns the author.
     */
    public function book()
    {
        return $this->belongsTo('App\Book','book_id');
    }
}
