<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'title', 
        'code', 
        'province_code',
    ];
}
