<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookTag extends Model
{
    /**
     * @var string
     */
    protected $table = 'book_tag';
    /**
     * Get the tag that owns the book.
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag','tag_id');
    }
    /**
     * Get the book that owns the tag.
     */
    public function book()
    {
        return $this->belongsTo('App\Book','book_id');
    }
}
