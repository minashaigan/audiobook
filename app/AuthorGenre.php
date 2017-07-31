<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorGenre extends Model
{
    /**
     * @var string
     */
    protected $table = 'author_genre';
    /**
     * Get the author that owns the genre.
     */
    public function author()
    {
        return $this->belongsTo('App\Author','author_id');
    }
    /**
     * Get the genre that owns the author.
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre','genre_id');
    }
}
