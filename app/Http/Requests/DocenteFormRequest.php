<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocenteFormRequest extends FormRequest
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
            'nombre' => [
                'required',
                'max:255'
            ],
            'apellido' => [
                'required',
                'max:255'
            ],
            'dni' => [
                'required',
                'max:255'
            ],
            'lugar_nacimiento' => [
                'required',
                'max:255'
            ],
            'fecha_nacimiento' => [
                'required',
                'max:255'
            ],
            'domicilio_actual' => [
                'required',
                'max:255'
            ],
            'telefono' => [
                'required'
            ],
            'celular' => [
                'required'
            ],
            'sistema_pension' => [
                'required',
                'max:50'
            ],
            'cuspp' => [
                'required',
                'max:50'
            ],
            'correo' => [
                'required',
                'max:50',
                'email'
            ],
            'idioma' => [
                'required',
                'max:255'
            ],
        ];
    }
}
