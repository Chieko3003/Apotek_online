<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * The names of the attributes that should not be trimmed.
     *
     * @var array<int, string>
     */
    protected $except = [
        'current_password',
        'password',
        'password_confirmation',
    ];
}
//         'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
//         'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
//         'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
//         'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
//         'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
//         'role' => \App\Http\Middleware\CheckRole::class,
//         'jabatan' => \App\Http\Middleware\CheckJabatan::class,
//     ];
//
//     /**
//      * The application's route middleware.
//      * 