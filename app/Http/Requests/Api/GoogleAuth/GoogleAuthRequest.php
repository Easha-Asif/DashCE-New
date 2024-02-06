<?php

namespace App\Http\Requests\Api\GoogleAuth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class GoogleAuthRequest extends FormRequest
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
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'string', 'email', Rule::unique('users', 'email')],
            'social_token' => ['required']
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'status' => 0,
            'message' => 'Invalid Parameters',
            'data' => $validator->errors()
        ], 422));
    }
}
