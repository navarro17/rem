<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class ProyectoFormRequest extends Request
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
            
            'nombre'=>'required|max:50',
            'fecha'=>'required|max:100',
            
            'fecha'=>'required|max:10'
            
            
            
            
        ];
    }
}