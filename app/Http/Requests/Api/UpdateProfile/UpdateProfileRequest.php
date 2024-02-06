<?php

namespace App\Http\Requests\Api\UpdateProfile;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;
use Auth;

class UpdateProfileRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:3', 'max:55'],
            // 'email' => ['required', 'email', Rule::unique('users', 'email')->ignore(Auth::user()->id)->whereNull('deleted_at')],
            'phone' => ['required', 'numeric', Rule::unique('users', 'phone')->ignore(Auth::user()->id)->whereNull('deleted_at')],
            'image' => ['nullable', 'string']
            // 'country_code' => ['required', 'integer'],
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
