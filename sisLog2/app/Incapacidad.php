<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Incapacidad extends Model
{
    //
    protected $table='incapacidad';

    protected $primaryKey='idIncapacidad';

    public $timestamps=false;

    protected $fillable = [
    
    	'nombrePaciente',
    	'medicoAsignado',
    	'edadPaciente',
    	'causaPaciente',
        'diasIncapacidad',
        'fechaIncapacidad',
        'horaIncapacidad'
        
        
    ];

    protected $guarded =[

    ];
}
