<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventarioRequest extends FormRequest
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
            'serial'=>'required',
			'marca'=>'required',
			'modelo'=>'required',
			'tipo'=>'required',
			'ubicacion'=>'required',
			'departamento'=>'required',
			'fecharegistro'=>'required|date_format:d-m-Y',
			'activo'=>'required',
        ];
    }
}
