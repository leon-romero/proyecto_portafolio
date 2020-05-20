<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductoRequest extends FormRequest
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
            'nombre_producto'=> 'required|min:2|max:100|unique:producto,nombre_producto',
            'descripcion'=> 'required|min:2|max:100',
            'stock'=> 'required|numeric|min:1',
            'stock_critico'=> 'required|numeric|min:1',
        ];
    }
}
