<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class IncapacidadFormRequest extends Request
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
            'nombrePaciente' => 'required|max:100',
            'medicoAsignado'=>'required|max:100',
            'edadPaciente'=>'required|max:70',
            'causaPaciente'=>'required|max:600',
            'diasIncapacidad'=>'required|max:70',
            'fechaIncapacidad' =>'required|max:30',
            'horaIncapacidad' =>'required|max:30'
            
            
            
        ];
    }
}
