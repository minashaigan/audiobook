<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagTag extends Model
{
    /**
     * @var string
     */
    protected $table = 'tagging_tags';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tag_group_id', 'slug', 'name', 'suggest', 'count'
    ];
}
