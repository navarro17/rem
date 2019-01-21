<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //
    protected $table='medico';

    protected $primaryKey='idMedico';

    public $timestamps=false;

    protected $fillable = [
    	'nombre',
    	'especialidad',
    	'telefono',
    	'correo',
    	'direccion'
    ];

    protected $guarded =[

    ];
}
