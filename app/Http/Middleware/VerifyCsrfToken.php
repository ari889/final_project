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
        '/packages/create', // not for package select
        '/password/change', // not for password change
        '/name/change', // not for change name
        '/users/allUsers', // not for live user registration data
        '/coinbase/webhook', // not for live user registration data
    ];
}
