<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;


class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     *
     * @return mixed
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next): mixed
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (TokenInvalidException) {
            throw new AuthenticationException(trans('errors.auth.token_invalid'));
        } catch (TokenExpiredException) {
            throw new AuthenticationException(trans('errors.auth.token_expired'));
        } catch (Exception) {
            throw new AuthenticationException(trans('errors.auth.un_authenticate'));
        }

        return $next($request);
    }
}
