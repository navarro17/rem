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
    
    	'altura',
    	'cantidad',
    	'modelo',
    	'dimensiones',
        'fabricante',
        'tipo',
        'montaje',
        'numLineas',
        'tipoLinea'
        
        
    ];

    protected $guarded =[

    ];
}