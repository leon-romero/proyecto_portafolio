<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TomaHoraCreateRequest extends FormRequest
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
            'id_horario' => 'required|exists:horario,id_horario',
            'id_servicio' => 'required|exists:servicio,id_servicio',
        ];
    }
}
