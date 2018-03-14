<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shedule extends Model
{
    protected $fillable = [
        'id', 'slot','user_id','order_id','ad_id'
    ];

    protected $table = 'shedules';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function order()
    {
        return $this->belongsTo('App\Orders');
    }

    public function countSlot($slot){
        return $this->where("slot",$slot)->count();
    }
}
