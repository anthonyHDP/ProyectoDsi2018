<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class MedicoFormRequest extends Request
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
            //
            'nombre' => 'required|max:50',
            'especialidad' => 'required|max:100',
            'telefono' => 'required|min:9',
            'direccion' => 'max:250',
            'correo' => 'email',
        ];
    }

    public function messages()
    {
        return[
            //'telefono.numeric' => 'El campo telefono debe ser numerico.',
            'direccion.max' => 'La direccion no puede ser mayor a :max caracteres',
        ];
    }

}