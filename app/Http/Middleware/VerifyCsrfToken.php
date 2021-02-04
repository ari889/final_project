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
        '/register/getallusers', // not for live user registration data
    ];
}
