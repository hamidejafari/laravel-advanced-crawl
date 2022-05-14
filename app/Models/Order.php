<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable = [
        'user_id',
        'order_status_id',
        'ref_id',
        'tracking_code',
        'total_prices',
        'quantity',
        'payment',
        'type','transaction_id'
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function orderStatus()
    {
        return $this->belongsTo('App\Models\OrderStatus', 'order_status_id', 'id');
    }

    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'id')->with('product');
    }
    
    
    public function transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'order_id', 'id');
    }




    public function scopeCurrentOrder($query)
    {
        $records = $query->where('order_status_id',1);
        return $records;
    }

    public function scopeNotifOrder($query)
    {
        $records = $query->where('order_status_id',4);
        return $records;
    }

}


