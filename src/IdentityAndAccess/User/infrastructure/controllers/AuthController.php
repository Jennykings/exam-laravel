<?php

namespace Src\IdentityAndAccess\User\infrastructure\controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\IdentityAndAccess\User\Application\RegisterUseCase;
use Src\IdentityAndAccess\User\Application\LoginUseCase;
use Src\IdentityAndAccess\User\Infrastructure\Validators\RegisterValidator;
use Src\IdentityAndAccess\User\Infrastructure\Validators\LoginValidator;

class AuthController
{
    public function register(Request $request, RegisterUseCase $registerUseCase)
    {
        $data = RegisterValidator::validate($request->all());
        $user = $registerUseCase($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login(Request $request, LoginUseCase $loginUseCase)
{
    $data = LoginValidator::validate($request->all());
    $user = $loginUseCase($data);
    $token = $user->createToken('auth_token')->plainTextToken;

    return response()->json([
        'access_token' => $token,
        'token_type' => 'Bearer',
    ]);
}

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada']);
    }
}