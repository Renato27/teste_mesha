<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EletronicPointSearchRequest extends FormRequest
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
            'search'   => 'nullable|string',
        ];
    }

    public function getSearchCallback()
    {
        return function($query){

            $termos = $this->only('search');

            foreach ($termos as $nome => $valor) {
                if ($valor) {
                    $query->where('name', 'LIKE', '%' . $valor . '%')
                        ->orWhere('cpf', 'LIKE', '%' . $valor . '%');
                }
            }
        };
    }
}
