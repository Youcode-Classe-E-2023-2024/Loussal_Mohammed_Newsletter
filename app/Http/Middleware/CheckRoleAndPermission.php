<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRoleAndPermission
{
    /**
     * @param $request
     * @param Closure $next
     * @param ...$rolesAndPermissions
     * @return mixed|void
     */
    public function handle($request, Closure $next, ...$rolesAndPermissions)
    {
        foreach ($rolesAndPermissions as $roleOrPermission) {
            if ($request->user()->hasRole($roleOrPermission) || $request->user()->can($roleOrPermission)) {
                return $next($request);
            }
        }

        abort(403, 'Unauthorized action.');
    }
}
