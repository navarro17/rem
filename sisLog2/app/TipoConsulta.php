<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class TipoConsulta extends Model
{
    protected $table=  'tipoConsulta';

    protected $primaryKey= 'idTipoConsulta';

    public $timestamps=false;

    protected $fillable= [
    	'nombreConsulta',
    	'precio',
    ];
}
