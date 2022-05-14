<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    protected $fillable = [
        'title',
        'color',
    ];
     public function products()
    {
        return $this->belongsToMany('App\Models\Product',
            'product_statuses', 'status_id', 'product_id');
    }

}


