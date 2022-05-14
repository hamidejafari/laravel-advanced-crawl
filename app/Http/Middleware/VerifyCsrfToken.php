<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'back-charge-bank',
        'back-shop-bank',
        'back-shop-item-bank',
        '/login2',
        '/post-login2'

    ];
}
