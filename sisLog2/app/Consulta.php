<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    //
    protected $table='consulta';

    protected $primaryKey='idConsulta';

    public $timestamps=false;

    protected $fillable = [
    	'nombreConsulta',
        'tipoConsulta',
        'fechaConsulta',
        'idPaciente',
        'idMedico',
        'diagnostico',
        'examenFisico',
        'edadPaciente',
        'pesoPaciente',
        'alturaPaciente',
        'alergiasPaciente',
        'medPaciente',
        'temPaciente',
        'presionArtPaciente'

    ];

    protected $guarded =[

    ];
}
