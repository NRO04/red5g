<?php

namespace App\Http\Controllers;

use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    private string $jwt_key;

    public function __construct()
    {
        $this->jwt_key = env('JWT_KEY');
    }
    public function login(Request $request){

        if(!$token = $this->attempLogin($request)){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json([
            ...$token,
        ], 200);
    }

    public function attempLogin(Request $request): array|bool
    {
        $user = User::where('email', $request->email)->first();

        if(!$user || !password_verify($request->password, $user->password)){
            return false;
        }

        $token = $this->generateToken([
            'names' => $user->names,
            'id' => $user->id,
        ]);

        return [
            'token' => $token,
        ];
    }

    public function generateToken($payload){
        return JWT::encode($payload, $this->jwt_key, 'HS256');
    }
}
