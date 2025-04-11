<?php

namespace Src\IdentityAndAccess\User\Infrastructure\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\IdentityAndAccess\User\Application\RegisterUseCase;
use Src\IdentityAndAccess\User\Application\LoginUseCase;
use Src\IdentityAndAccess\User\Infrastructure\Validators\RegisterValidator;
use Src\IdentityAndAccess\User\Infrastructure\Validators\LoginValidator;

class AuthController extends Controller
{
    public function register(Request $request, RegisterUseCase $registerUseCase)
    {
        $data = RegisterValidator::validate($request->all());
        $user = $registerUseCase($data);
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'data' => $user,
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
        'message' => 'Hi ' . $user->name, 
        'access_token' => $token,
        'token_type' => 'Bearer',
        'user' => $user, 
    ]);
}

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'Sesión cerrada']);
    }

    public function show(Request $request)
{
    $user = $request->user();

    if (!$user) {
        return response()->json([
            'message' => 'Usuario no autenticado o no registrado.'
        ], 404);
    }

    return response()->json($user);
}
}