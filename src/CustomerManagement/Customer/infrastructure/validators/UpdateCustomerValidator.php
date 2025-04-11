<?php

namespace Src\CustomerManagement\Customer\Infrastructure\Validators;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator as LaravelValidator;

class UpdateCustomerValidator 
{
    public function validate(array $data): void
    {
        $validator = LaravelValidator::make($data, $this->rules());

        if ($validator->fails()) {
            $this->failedValidation($validator);
        }
    }

    protected function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ];
    }

    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json(['errors' => $validator->errors()], 422)
        );
    }
}