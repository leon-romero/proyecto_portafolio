<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProveedorRequest extends FormRequest
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
            'username'=>'required|min:2|max:100|unique:ficha_proveedor,username',
            'nombre_empresa'=>'required|min:2|max:100',
            'rubro'=>'required|min:2|max:100',
            'telefono'=>'required|min:7|max:9',
            'correo'=>'required|min:4|max:100|email|unique:ficha_proveedor,correo',
        ];
    }
}
