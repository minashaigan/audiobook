<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NarratorReview extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_review_narrator';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'rate', 'enable'
    ];
    /**
     * Get the user that owns the review.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    /**
     * Get the book that owns the review.
     */
    public function book()
    {
        return $this->belongsTo('App\Book','book_id');
    }
}
