<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class RecetaFormRequest extends Request
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

            'indicaciones' => 'required|max:500',
            'medicamentos' => 'required|max:500',
            'fecha' => 'required|max:50',
            'nombrePaciente' => 'required|max:100',
            'idMedico' => 'required',
            
        ];
    }
}
