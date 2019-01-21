<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    //
    protected $table= 'cita';

    protected $primaryKey='id';

    protected $fillable= [
    	'nombrePaciente','nombreMedico','fechaCita','horaCita','tipoCita','reservacionCita','color'
    ];

    protected $guarded =[

    ];
}
