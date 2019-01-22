<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $table='articulo';

    protected $primaryKey='idArticulo';

    public $timestamps=false;

    protected $fillable = [
    
    	
    	'cantidad',
    	'modelo',
    	
        'fabricante',
        'tipoArticulo',
        
        'descripcion'
        
        
    ];

    protected $guarded =[

    ];
}