<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Redirects extends Model
{
    protected $table = 'redirect';
    
    protected $fillable = [

        'old_address' , 'new_address' , 
    ];
}
