<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Http\Response;

/**
 * Class MemberMiddleware
 * @package App\Http\Middleware
 */
class MemberMiddleware
{
    /**
     * Handle an incoming request.
     * @param $request
     * @param Closure $next
     * @return Response|mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->permission != User::PERMISSION_MEMBER){
            return new Response(view('auth.denied', [
                'code' => '403',
                'message' => 'Members access only.'
            ]));
        }

        return $next($request);
    }
}
