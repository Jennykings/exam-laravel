<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Las rutas que deberían estar exentas de la verificación CSRF.
     *
     * @var array
     */
    protected $except = [
        //'http://exam.test/authors',
        //'authors/*',  // Excluye todas las rutas que empiecen con 'authors/'
    ];
}