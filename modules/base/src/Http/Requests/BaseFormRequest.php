<?php

namespace Lavakit\Base\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;
use Lavakit\Base\Services\JsonResponse as LavakitJsonResponse;

/**
 * Class BaseFormRequest
 * @package Lavakit\Base\Http\Requests
 * @copyright 2020 Lavakit Group
 * @author tqhoa <tqhoa8th@gmail.com>
 */
abstract class BaseFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();
    
    /**
     * Handle a failed validation attempt.
     *
     * @param Validator $validator
     * @throws ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        $response = new JsonResponse([
            'success' => LavakitJsonResponse::STATUS_FAILURE,
            'message' => trans('base::base.forms.data_invalid'),
            'errors' => $validator->errors()
        ], LavakitJsonResponse::HTTP_UNPROCESSABLE_ENTITY);
        
        throw new ValidationException($validator, $response);
    }
}
