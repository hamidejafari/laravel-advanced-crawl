<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{

    protected $fillable = [
        'order_id',
        'product_id',
        'order_item_status_id',
        'file',
        'description',
        'title',
        'name',
        'link',
        'problems',
        'ref_id',
        'transaction_id'
    ];

    public function orderStatus()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'order_item_status_id', 'id');
    }
    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'product_id', 'id')->with('categories')->with('language')->with('country');
    }
}
