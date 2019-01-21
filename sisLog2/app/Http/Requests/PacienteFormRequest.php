<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class PacienteFormRequest extends Request
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
            'nombre' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'apellido' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required|min:8',
            'direccion' => 'required|max:250',
            'tipoSangre' => 'required|max:50',
            'sexo' => 'required|max:50',
            'estadoCivil' => 'required|max:50',
        ];
    }

    public function messages(){
        return [
           'telefono.numeric'=> 'El campo telefono debe ser numerico.',
            'direccion.max' => 'La direccion no puede ser mayor a :max caracteres',
        ];
     }
}
