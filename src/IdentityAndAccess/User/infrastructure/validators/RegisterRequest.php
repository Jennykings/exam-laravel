<?php

namespace Src\IdentityAndAccess\User\Infrastructure\Validators;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class RegisterValidator
{
    public static function validate(array $data): array
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6'],
        ])->validate();
    }
}