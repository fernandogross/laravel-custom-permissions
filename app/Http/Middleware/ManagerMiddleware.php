<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Http\Response;

/**
 * Class ManagerMiddleware
 * @package App\Http\Middleware
 */
class ManagerMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @return Response|mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->permission != User::PERMISSION_MANAGER){
            return new Response(view('auth.denied', [
                'code' => '403',
                'message' => 'Managers access only.'
            ]));
        }

        return $next($request);
    }
}
