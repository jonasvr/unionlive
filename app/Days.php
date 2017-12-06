<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    protected $fillable = [
        'id', 'day'
    ];

    protected $table = 'days';
}
