<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table='paciente';

    protected $primaryKey='idPaciente';

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    	'apellido',
    	'fechaNacimiento',
    	'telefono',
    	'tipoSangre',
    	'direccion',
    	'sexo',
    	'estadoCivil',
    ];

    protected $guarded =[

    ];
}
