<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NarratorGenre extends Model
{
    /**
     * @var string
     */
    protected $table = 'narrator_genre';
    /**
     * Get the narrator that owns the genre.
     */
    public function narrator()
    {
        return $this->belongsTo('App\Narrator','narrator_id');
    }
    /**
     * Get the genre that owns the narrator.
     */
    public function genre()
    {
        return $this->belongsTo('App\Genre','genre_id');
    }
}
