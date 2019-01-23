<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    //
    protected $table='prestamo';

    protected $primaryKey='idPrestamo';

    public $timestamps=false;

    protected $fillable = [
    
    	
    	//'idArticulo',
    	'idTecnico',
        'idProyecto',
        'fecha'
        
        
        
        
    ];

    protected $guarded =[

    ];
}