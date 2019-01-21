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
    
    	'coordinadas',
    	'tipoSitio',
    	'acceso',
    	'shelter',
        'torreTipo',
        'areasAdyacentes',
        'fechaSurvey',
        'horaSurvey'
        
        
    ];

    protected $guarded =[

    ];
}