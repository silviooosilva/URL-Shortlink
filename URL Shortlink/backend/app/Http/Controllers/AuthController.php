<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\IAuthService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected IAuthService $auth;

    public function __construct(IAuthService $auth) 
    {
        $this->auth = $auth;
    }

    public function me() : JsonResponse
    {
        return $this->auth->me();
    }

    public function login(Request $request) : JsonResponse
    {
        $credentials = $request->only(['email', 'password']);

        return $this->auth->login($credentials);
    }

    public function logout() : JsonResponse
    {
        return $this->auth->logout();
    }

    public function resetPassword(Request $request) : JsonResponse
    {
        /*
        $userExist = User::where('email', $request['email'])->get();
        if($userExist)
        {
            $token = Str::random(60);
            Mail::to($request['email'])->send(new MailPasswordService($token));
            return response()->json(['response' => 'Email enviado', 'token' => $token]);
        }
        */
        return response()->json(['response' => 'Email não cadastrado!']);
    }
    
}
