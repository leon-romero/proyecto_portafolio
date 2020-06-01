<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePacienteRequest extends FormRequest
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
            'run' => 'required|regex:/^\d{7,8}[0-9K]{1}$/|unique:ficha_cliente,run',
            'nombres' => 'required|min:2|max:100',
            'apellidos' => 'required|min:2|max:100',
            'telefono' => 'required|min:7|max:9',
            'correo' => 'required|min:4|max:100|email|unique:ficha_cliente,correo',
            'region' => 'required|exists:region,id_region',
            'id_comuna' => 'required|exists:comuna,id_comuna',
            'direccion' => 'required|min:2|max:200',
        ];
    }
}
