<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'name' => [
                'required',
                'min:3',
                'max:50',
            ],
            'email' => [
                'required',
                'email:rfc',
            ],
            'birthdate' => [
                'required',
                'date',
            ],
            'profile_picture' => [
                'nullable',
                'image'
            ],
            'address' => [
                'required',
                'min: 10'
            ],
            'description' => [
                'required',
                'max:250'
            ]
        ];
    }
}
