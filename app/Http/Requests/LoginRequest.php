<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

use Illuminate\Validation\ValidationException;

use Illuminate\Support\Facades\Log;

class LoginRequest extends FormRequest
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

    protected function failedValidation(Validator $validator)
    {
        Log::info("Falla validacion");
        $response = new JsonResponse([
                'message' => 'Verifique la siguiente información:',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        
            throw new ValidationException($validator, $response);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user' => ['required'],
            'password' => ['required', 'min:5'],
        ];
    }

    public function messages()
    {
        return [
            'user.required' => 'El nombre de usuario es obligatorio',
        ];
    }
}
