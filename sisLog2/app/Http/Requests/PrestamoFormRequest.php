<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class PrestamoFormRequest extends Request
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

            //'idArticulo'=>'max:10',
            'idTecnico'=>'required|max:10',
            'idProyecto' =>'required|max:10',
            'fecha' =>'required|max:10'
            
            
            
            
            
            
        ];
    }
}