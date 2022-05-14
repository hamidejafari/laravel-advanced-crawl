<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrawledDomains extends Model
{
    protected $table = 'crawled_domains';

    protected $fillable = [
        'domain'
    ];
}
