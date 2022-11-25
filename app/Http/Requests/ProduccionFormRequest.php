<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProduccionFormRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tipo' => [
                'max:255'
            ],
            'institucion' => [
                'required',
                'max:255'
            ],
            'year' => [
                'required',
                'max:255'
            ],
            'otro' => [
            ],
            'documento' => [
            ],
            'idDocente' => [
            ]
        ];
    }
}
