<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'id', 'price','payed','payed_at','user_id','ad_id'
    ];

    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shedule()
    {
        return $this->hasMany('App\Shedule');
    }
}
