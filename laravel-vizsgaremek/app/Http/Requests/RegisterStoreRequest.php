<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                'min:3',
                'max:50',
            ],
            'email' => [
                'required',
                'email:rfc',
            ],
            'password' => [
                'required',
                'min:8',
                'max:256',
                'confirmed',
            ],
            'password_confirmation' => [
                'required',
                'min:8',
                'max:256',
            ],
            'birthdate' => [
                'required',
                'date',
            ],
            'profile_picture' => [
                'nullable',
                'image'
            ]
        ];
    }
}
