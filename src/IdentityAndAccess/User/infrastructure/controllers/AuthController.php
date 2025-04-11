<?php

namespace Src\IdentityAndAccess\User\Infrastructure\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Src\IdentityAndAccess\User\Application\RegisterUseCase;
use Src\IdentityAndAccess\User\Application\LoginUseCase;
use Src\IdentityAndAccess\User\Infrastructure\Validators\RegisterValidator;
use Src\IdentityAndAccess\User\Infrastructure\Validators\LoginValidator;
use Illuminate\Validation\ValidationException;
use Exception;

class AuthController extends Controller
{
    public function register(Request $request, RegisterUseCase $registerUseCase)
    {
        try {
            $data = RegisterValidator::validate($request->all());
            $user = $registerUseCase($data);
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'data' => $user,
                'access_token' => $token,
                'token_type' => 'Bearer',
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Datos inválidos.',
                'details' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al registrar el usuario.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function login(Request $request, LoginUseCase $loginUseCase)
    {
        try {
            $data = LoginValidator::validate($request->all());
            $user = $loginUseCase($data);
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Hi ' . $user->name,
                'access_token' => $token,
                'token_type' => 'Bearer',
                'user' => $user,
            ]);
        } catch (ValidationException $e) {
            return response()->json([
                'error' => 'Datos inválidos.',
                'details' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al iniciar sesión.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            $request->user()->tokens()->delete();
            return response()->json(['message' => 'Sesión cerrada']);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al cerrar sesión.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function show(Request $request)
    {
        try {
            $user = $request->user();

            if (!$user) {
                return response()->json([
                    'message' => 'Usuario no autenticado o no registrado.'
                ], 404);
            }

            return response()->json($user);
        } catch (Exception $e) {
            return response()->json([
                'error' => 'Error al obtener el usuario.',
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}