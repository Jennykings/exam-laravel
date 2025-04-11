<?php

namespace Src\IdentityAndAccess\User\Infrastructure\Validators;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class LoginValidator
{
    public static function validate(array $data): array
    {
        return Validator::make($data, [
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ])->validate();
    }
}