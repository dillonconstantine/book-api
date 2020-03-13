<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiFormRequest extends FormRequest
{
    protected function failedValidation(Validator $validator) {
        foreach($validator->errors()->all() as $message) {
            $errors[] = [
                'status' => 400,
                'detail' => $message
            ];
        }

        $errors = [
            'errors' => $errors,
        ];

        return response($errors, 400)->send();
    }
}
