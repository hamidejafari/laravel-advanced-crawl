<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use SoftDeletes;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    
    protected $fillable = [

        'category_id' ,   'product_id'  ,

    ];
}
