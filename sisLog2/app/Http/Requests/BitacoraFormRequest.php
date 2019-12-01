<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class BitacoraFormRequest extends Request
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
            'IDBITACORA' => 'required|max:100',
            'IDUSUARIO' => 'required|max:100',
            'DESCRIPCIONBITACORA' => 'required|max:500',
            'FECHABITACORA'=>'required|max:100',
            'HORABITACORA'=>'required|max:100',

            
            
            
            
            
        ];
    }
}
