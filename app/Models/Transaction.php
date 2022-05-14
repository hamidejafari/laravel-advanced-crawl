<?php namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'gateway_transactions';



    protected $fillable = [
        'result_code' ,
        'result_message' ,
        'log_date' ,
        'order_id' ,
        'user_id' ,
        'price' ,
        'card_number' ,
        'status' ,
        'ip' ,
        'ref_id','description','type',
        'order_item_id',
        'product_new_id',
        'product_old_id',
        'description',
    ];




    public function productNew()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_new_id');
    }

    public function productOld()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_old_id');
    }

    public function order()
    {
        return $this->hasOne('App\Models\Order', 'id', 'order_id')->with('orderItems');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

}
