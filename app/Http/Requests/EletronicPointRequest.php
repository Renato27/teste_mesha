<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EletronicPointRequest extends FormRequest
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
            'name'      => 'required|string|max:100',
            'email'     => 'required|email:rfc,dns',
            'cpf'       => 'required|between:14,14|unique:eletronic_points,cpf',
        ];
    }
}
