<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NarratorTag extends Model
{
    /**
     * @var string
     */
    protected $table = 'narrator_tag';
    /**
     * Get the narrator that owns the atg.
     */
    public function narrator()
    {
        return $this->belongsTo('App\Narrator','narrator_id');
    }
    /**
     * Get the genre that owns the narrator.
     */
    public function tag()
    {
        return $this->belongsTo('App\Tag','tag_id');
    }
}
