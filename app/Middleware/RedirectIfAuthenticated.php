<?php
// app/Http/Middleware/RedirectIfAuthenticated.php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\RedirectIfAuthenticated as Middleware;

class RedirectIfAuthenticated extends Middleware
{
    protected $redirectTo = '/home';
}
