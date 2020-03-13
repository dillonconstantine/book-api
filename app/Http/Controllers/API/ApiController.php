<?php

namespace App\Http\Controllers\API;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    protected function formatValidatorErrors($validatorErrors) {
        $errors = [];

        foreach($validatorErrors as $error) {
            $errors[] = [
                'status' => 400,
                'detail' => $error
            ];
        }

        $errors = $this->wrapErrors($errors);

        return $errors;
    }

    protected function wrapErrors($errorsDetails) {
        $errors = [
            'errors' => $errorsDetails,
        ];

        return $errors;
    }

    protected function checkTypeMatches($type) {
        if ($type === 'books') return;
        
        $errorDetails = [
            'status' => '409',
            'title'  => 'Invalid type',
            'detail' => 'The current type does not respresent the endpoint',
        ];

        $errors = $this->wrapErrors($errorDetails);

        return response($errors, 409)->send();
    }

    protected function checkClientId($id) {
        if (!isset($id)) return;

        $errorDetails = [
            'status' => '403',
            'title'  => 'Client-generated ID',
            'detail' => 'A client-generated ID cannot be provided',
        ];

        $errors = $this->wrapErrors($errorDetails);

        return response($errors, 403)->send();
    }

    protected function checkIdMatches($id) {
        if ($id === request()->segment(count(request()->segments()))) return;

        $errorDetails = [
            'status' => '409',
            'title'  => 'Invalid ID',
            'detail' => 'The provided ID does not match the endpoint',
        ];

        $errors = $this->wrapErrors($errorDetails);

        return response($errors, 409)->send();
    }
}
