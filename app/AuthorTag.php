<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuthorTag extends Model
{
    /**
     * @var string
     */
    protected $table = 'author_tag';
    /**
     * Get the author that owns the atg.
     */
    public function author()
    {
        return $this->belongsTo('App\Author','author_id');
    }
    /**
     * Get the genre that owns the author.
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag','tag_id');
    }
}
