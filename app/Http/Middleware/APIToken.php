<?php

namespace App\Http\Middleware;

use Closure;
use App\Eloquent\StudentToken;
use App\Eloquent\Students;

class APIToken
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
        if ($request->header('Authorization') === null) {
            return response()->json([
                'message' => 'Not a valid API request.',
            ]);
        }

        if ($this->isValidToken($request->header('Authorization')) === false) {
            return response()->json([
                'message' => ' Invalid Token.',
            ]);
        }

        return $next($request);
    }

    private function isValidToken($token)
    {
        $api_token = StudentToken::where('access_token',$this->parseToken($token))->first();

        if ($api_token === null) {
            return false;
        }

        return true;
    }

    private function parseToken($token)
    {
        return str_replace('Bearer ', '', $token);
    }
}
