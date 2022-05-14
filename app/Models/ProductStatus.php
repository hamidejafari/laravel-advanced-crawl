<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class ProductStatus extends Model
{
    protected $table = 'product_statuses';
    
    protected $fillable = [

        'status_id' ,   'product_id'  ,

    ];
      public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id','id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
