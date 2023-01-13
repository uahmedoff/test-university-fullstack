<?php

namespace Modules\Schedule\Http\Requests;

use App\Traits\ResponseAble;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class ApiRequest extends FormRequest{
    use ResponseAble;

    protected function failedValidation(Validator $validator){
        $errors = (new ValidationException($validator))->errors();
        return $this->sendError(
            $errors,
            'Validation error',
            422
        );
    }
}