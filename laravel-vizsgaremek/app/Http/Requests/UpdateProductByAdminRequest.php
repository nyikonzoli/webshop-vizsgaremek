<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductByAdminRequest extends FormRequest
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
            "name" => [
                "requierd",
                "max:50",
            ],
            "description" => [
                "required",
                "max:350",
            ],
            "price" => [
                "required",
                "double",
            ],
            "categoryId" => [
                "required",
                "integer",
            ],
            "imageIds" => [
                "array"
            ]
        ];
    }
}
