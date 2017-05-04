<?php

namespace App\Traits;

use App\Exceptions\EasyValidationException;
use Illuminate\Http\JsonResponse;
use Validator;

trait EasyValidationTrait {

    protected function easyValidate($form, $rules) {
        $validator = Validator::make($form, $rules);

        $errors = $validator->errors();
        $errors = $errors->all();

        if ($errors) {
            $data = [
                'status' => false,
                'errors' => $errors
            ];

            throw new EasyValidationException($validator, new JsonResponse($data, 422));
        }
    }

}