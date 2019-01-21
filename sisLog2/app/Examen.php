<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    //
    protected $table='examen';

    protected $primaryKey='idExamen';

    public $timestamps=false;

    protected $fillable = [
    
    	'nombrePaciente',
    	'medicoAsignado',
    	'tipoExamen',
    	'resultado',
        'fechaControl',
        'horaControl'
        
        
    ];

    protected $guarded =[

    ];
}
