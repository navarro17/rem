<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $table='survey';

    protected $primaryKey='idSurvey';

    public $timestamps=false;

    protected $fillable = [
    
    	'coordenadas',
    	'tipoSitio',
    	'acceso',
    	'shelter',
        'torreTipo',
        'areasAdyacentes',
        'montaje',
        'altura',
        'numeroLineas',
        'tipoLinea',
        'fechaSurvey',
        'horaSurvey'
        
        
    ];

    protected $guarded =[

    ];
}