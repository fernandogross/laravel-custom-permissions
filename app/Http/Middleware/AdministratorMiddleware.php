<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Http\Response;

/**
 * Class AdministratorMiddleware
 * @package App\Http\Middleware
 */
class AdministratorMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @return Response|mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->permission != User::PERMISSION_ADMIN){
            return new Response(view('auth.denied', [
                'code' => '403',
                'message' => 'Administrators access only.'
            ]));
        }

        return $next($request);
    }
}
