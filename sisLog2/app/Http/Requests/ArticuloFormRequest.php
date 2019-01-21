<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class ArticuloFormRequest extends Request
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
            'altura' => 'required|max:100',
            'cantidad'=>'required|max:100',
            'modelo'=>'required|max:100',
            'dimensiones'=>'required|max:100',
            'fabricante'=>'required|max:100',
            'tipoArticulo'=>'required|max:100',
            'montaje' =>'required|max:100',
            'numLineas' =>'required|max:30',
            'tipoLinea'=>'required|max:1000'
            
            
            
        ];
    }
}