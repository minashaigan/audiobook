<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];
    /**
     * The books that belong to the tag.
     */
    public function books()
    {
        return $this->belongsToMany('App\Book', 'book_tag', 'tag_id', 'book_id');
    }
    /**
     * The authirs that belong to the tag.
     */
    public function authors()
    {
        return $this->belongsToMany('App\Author', 'author_tag', 'tag_id', 'author_id');
    }
    /**
     * The narrators that belong to the tag.
     */
    public function narrators()
    {
        return $this->belongsToMany('App\Narrator', 'narrator_tag', 'tag_id', 'narrator_id');
    }
}
