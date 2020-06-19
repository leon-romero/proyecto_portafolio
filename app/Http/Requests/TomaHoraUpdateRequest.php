<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TomaHoraUpdateRequest extends FormRequest
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
            'id_estado'=>'required|numeric|in:1,2,3',
            'comentario'=>'required|min:2|max:300',
        ];
    }
}
