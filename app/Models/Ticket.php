<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{

    protected $fillable = [
        'user_id',
        'admin_id',
        'content',
        'subject',
        'reply_id',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
    public function replies()
    {
        return $this->hasMany('App\Models\Ticket', 'reply_id', 'id')->with('user');
    }
}


