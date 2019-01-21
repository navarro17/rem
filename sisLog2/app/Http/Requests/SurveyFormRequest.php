<?php

namespace sisLog2\Http\Requests;

use sisLog2\Http\Requests\Request;

class SurveyFormRequest extends Request
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
            'coordenadas' => 'required|max:100',
            'tipoSitio'=>'required|max:100',
            'acceso'=>'required|max:100',
            'shelter'=>'required|max:600',
            'torreTipo'=>'required|max:100',
            'areasAdyacentes'=>'required|max:100',
            'fechaSurvey' =>'required|max:30',
            'horaSurvey' =>'required|max:30'
            
            
            
        ];
    }
}