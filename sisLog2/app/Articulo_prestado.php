<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Articulo_prestado extends Model
{
    //
    protected $table='articulo_prestado';

    protected $primaryKey='idArtPre';

    public $timestamps=false;

    protected $fillable = [
    
    	
    	'idArticulo',
    	'idPrestamo',
        'canArt'
        
        
        
        
        
    ];

    protected $guarded =[

    ];
}