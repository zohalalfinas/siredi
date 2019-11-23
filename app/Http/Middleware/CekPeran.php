<?php

namespace App\Http\Middleware;

use Closure;

class CekPeran
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $peran = $this->CekRoute($request->route());

        if ($request->user()->punyaPeran($peran) || !$peran) {
            return $next($request);
        }
        return abort(403, 'Anda Tidak Memiliki Hak Akses');
    }

    private function CekRoute($route)
    {
        $actions = $route->getAction();
        return isset($actions['peran']) ? $actions['peran'] : null;
    }
}
