<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookNarrator extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_narrator';
    /**
     * Get the narrator that owns the book.
     */
    public function narrator()
    {
        return $this->belongsTo('App\Narrator','narrator_id');
    }
    /**
     * Get the book that owns the narrator.
     */
    public function book()
    {
        return $this->belongsTo('App\Book','book_id');
    }
}
