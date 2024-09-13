<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Exceptions\MaintenanceModeException;

class PreventRequestsDuringMaintenance
{
    public function handle($request, Closure $next)
    {
        if ($this->isDownForMaintenance()) {
            throw new MaintenanceModeException;
        }

        return $next($request);
    }

    protected function isDownForMaintenance()
    {
        return app()->isDownForMaintenance();
    }
}
