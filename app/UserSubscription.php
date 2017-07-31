<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    /**
     * @var string
     */
    protected $table = 'user_has_subscription';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'paid', 'expiration_date'
    ];
    /**
     * Get the user that owns the subscription.
     */
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    /**
     * Get the subscription that owns the user.
     */
    public function subscription()
    {
        return $this->belongsTo('App\Subscription','subscription_id');
    }
}
