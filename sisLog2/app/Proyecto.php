<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    //
    protected $table='proyecto';

    protected $primaryKey='idProyecto';

    public $timestamps=false;

    protected $fillable = [
    
    	
    	'nombre',
    	'fecha'
    	
        
        
        
    ];

    protected $guarded =[

    ];
}