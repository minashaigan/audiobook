<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Narrator extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'introduction', 'image'
    ];
    /**
     * The books that belong to the narrator.
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_narrator', 'narrator_id', 'book_id');
    }
    /**
     * The genres that belong to the narrator.
     */
    public function genres()
    {
        return $this->belongsToMany('App\Genre', 'narrator_genre', 'narrator_id', 'genre_id');
    }
    /**
     * The reviews of the author.
     */
    public function reviews()
    {
        return $this->belongsToMany('App\User', 'user_review_narrator', 'narrator_id', 'user_id')
            ->withPivot('comment','rate','enable')
            ->withTimestamps();
    }
    /**
     * The tags of the author.
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'narrator_tag', 'narrator_id', 'tag_id');
    }
}
