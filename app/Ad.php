<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $fillable = [
        'id', 'title','created_at'
    ];

    protected $table = 'ad';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
