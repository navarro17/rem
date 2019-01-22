<?php

namespace sisLog2\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgendaFormRequest extends FormRequest
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
            'nombreEmpresa' => 'required|max:100',
            'tipoServicio' => 'required|max:100',
            'descripcionServicio' => 'required|max:150',
            'fechaServicio' => 'required|max:75',
            'horaServicio' => 'required|max:75',
            'reservacionAgenda'=>'required',
            
        ];
    }
}
