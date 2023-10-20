<?php

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

trait RequestValidationErrorTrait
{

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            toast($validator->errors()->first(),'info')
        );
    }


}
