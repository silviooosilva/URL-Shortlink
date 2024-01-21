<?php

namespace App\Services;

use App\Models\User;
use App\Services\Interfaces\IAuthService;
use DateTime;
use DateTimeZone;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthService implements IAuthService
{
    protected User $user;

    public function __construct(User $user) 
    {
        $this->user = $user;
    }

    public function login(array $credentials) : JsonResponse
    {
        if (! $token = auth()->attempt($credentials)) 
            return response()->json(['error' => 'Unauthorized'], 401);
        
        return $this->responseWithToken($token);
    }

    public function logout() : JsonResponse
    {
        try
        {
            if (auth()->check()) auth()->logout();
            
            return response()->json(['message' => 'Sessão finalizada com sucesso']);
        }
        catch(JWTException $e)
        {
            return response()->json(['message' => 'Erro: '.$e]);
        }

    }

    public function me() : JsonResponse
    {
        return response()->json(auth()->user());
    }

    public function refresh() : JsonResponse
    {
        return $this->responseWithToken(auth()->refresh());
    }

    protected function responseWithToken(string $token) : JsonResponse
    {
        $user = auth()->user();
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'user_id' => $user['id'],
            'expires_in' => auth()->factory()->getTTL(),
            'login_in' => new DateTime('now', new DateTimeZone('America/Sao_Paulo'))
        ]);
    }
}