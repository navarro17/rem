<?php

namespace sisLog2\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaFormRequest extends FormRequest
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
            'nombrePaciente' => 'required|max:50',
            'nombreMedico' => 'required|max:50',
            'descripcion' => 'required,max:150',
            'fechaCita' => 'required',
            'horaCita' => 'required',
            'reservacionCita'=>'required',
            
        ];
    }
}
