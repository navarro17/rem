<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class ConsultaFormRequest extends Request
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
            'nombreConsulta' => 'required|max:100',
			'tipoConsulta' => 'required|max:100',
			'fechaConsulta' => 'required|date',
    	    'idPaciente' => 'required|max:100',
    	    'idMedico' => 'required|max:100',
    	    'diagnostico' => 'required|max:400',
        ];
    }
}
