<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    protected $table = 'profits';

    protected $fillable = [

        'from_price' , 'to_price' , 'profit_price','type'
    ];
}
