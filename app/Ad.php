<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'id', 'title','path_art','path_audio','user_id'
    ];

    protected $table = 'ad';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
