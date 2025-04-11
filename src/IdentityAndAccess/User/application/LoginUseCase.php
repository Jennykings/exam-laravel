<?php

declare(strict_types=1);

namespace Src\IdentityAndAccess\User\Application;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Src\IdentityAndAccess\User\Domain\Contracts\UserRepositoryContract;

class LoginUseCase
{
    public function __construct(
        private UserRepositoryContract $repository
    ) {}

    public function __invoke(array $credentials): \App\Models\User
    {
        if (!Auth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Credenciales incorrectas'],
            ]);
        }

        $user = Auth::user();

        if (!$user instanceof \App\Models\User) {
            throw new \RuntimeException('Error de autenticación');
        }

        return $user;
    }
}