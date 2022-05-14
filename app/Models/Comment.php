<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    
    protected $fillable = [

        'name' , 'email' , 'text' , 'commentable_id' , 'commentable_type' , 'status' , 'parent_id' , 'read_at' , 

    ];  


    public function commentable()
    {
        return $this->morphTo();
    }
  

    public function product()
    {
        return $this->belongsTo('App\Models\Product' , 'commentable_id' , 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category' , 'commentable_id' , 'id');
    }

    public function article()
    {
        return $this->belongsTo('App\Models\Content' , 'commentable_id' , 'id');
    }
    public function replies()
    {
        return $this->hasMany('App\Models\Comment' , 'parent_id' , 'id');
    }
}
