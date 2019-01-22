<?php

namespace sisLog2;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    //
    protected $table= 'agenda';

    protected $primaryKey='idAgenda';

    protected $fillable= [
    	'nombreEmpresa','tipoServicio','descripcionServicio','fechaServicio','horaServicio','reservacionAgenda','color'
    ];

    protected $guarded =[

    ];
}
