<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Tecnico extends Model
{
    //
    protected $table='tecnico';

    protected $primaryKey='idTecnico';

    public $timestamps=false;

    protected $fillable = [
    
    	
    	'nomtec',
    	'apellido',
    	
        'edad'
        
        
    ];

    protected $guarded =[

    ];
}