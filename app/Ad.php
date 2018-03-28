<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'id', 'title','path_art','path_audio','user_id', 'price'
    ];

    protected $table = 'ad';

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function shedule()
    {
        return $this->hasMany('App\Shedule');
    }

    public function order()
    {
        return $this->hasOne('App\Orders');
    }
}
