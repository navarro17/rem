<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    //
    /**protected $table='paciente';
    protected $table='receta';
    protected $primaryKey='idPaciente';
    protected $primaryKey='idReceta';
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
        'indicaciones',
        'fecha'
    ];

    protected $guarded =[

    ];**/
    protected $table='receta';
    protected $primaryKey='idReceta';
    public $timestamps=false;

    protected $fillable = [
        'idMedico',
        'idPaciente',
        'indicaciones',
        'fecha',
        'nombrePaciente',
        'medicamentos',
    ];

    protected $guarded =[

    ];
}
