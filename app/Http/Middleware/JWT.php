<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JWT
{
    const EXCEPTIONS = [
        "SignatureInvalidException", "Token is Invalid",
        "ExpiredException", "Token is Expired",
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->header('Authorization') ?? null;

        if(!$token){
            return response()->json([
                'error' => 'Unauthorized',
            ], 401);
        }

        try {
            $token = explode(' ', $token)[1];
            $decoded_token = \Firebase\JWT\JWT::decode($token, new Key(env('JWT_KEY'), 'HS256'));
        }catch(\Exception $e){
            return response()->json(
                [
                    "status" => self::EXCEPTIONS[$this->getClassName($e)] ?? "Authentication Error, Token is not found."
                ]);
        }
        return $next($request);
    }

    public function getClassName($event): ?string
    {
        //Transform to array where it found
        $class = explode('\\', get_class($event));
        //returns class name
        return array_pop($class);
    }
}
