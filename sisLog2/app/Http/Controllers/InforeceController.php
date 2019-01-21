<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Receta;
use sisLog2\Medico;
use sisLog2\Paciente;
use PDF;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\RecetaFormRequest;
use DB;

class InforeceController extends Controller
{
    //
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $recetas=DB::table('receta')->where('nombrePaciente','LIKE','%'.$query.'%')
            ->orderBy('idReceta','desc')
            ->paginate(7);
            
            return view('clinica.infoReceta.index',["recetas"=>$recetas,"searchText"=>$query,]);
        }
    }

    public function show($id)
    {
        $receta=Receta::findOrFail($id);
        $pdf = PDF::loadView("clinica.infoReceta.recetaPDF",["receta"=>$receta]);
        return $pdf->stream($receta->nombrePaciente);
    }

    public function edit($id)
    {
        $medico = Medico::all();
        $paciente = Paciente::all();
        return view("clinica.infoReceta.edit",["receta"=>Receta::findOrFail($id)])->with('paciente',$paciente)->with('medico',$medico);
    }


    public function update(RecetaFormRequest $request,$id)
    {
         
        $receta = Receta::findOrFail($id);
        $receta->nombrePaciente=$request->get('nombrePaciente');
        $receta->indicaciones=$request->get('indicaciones');
        $receta->fecha=$request->get('fecha');
        $receta->idMedico=$request->get('idMedico');
        $receta->idPaciente=$request->get('idPaciente');
        $receta->medicamentos=$request->get('medicamentos');
        $receta->update();
        
        return Redirect::to('clinica/infoReceta');
        
    }

    public function destroy($id)
    {
    	$receta=Receta::findOrFail($id);
    	$receta->delete();

    	return Redirect::to('clinica/infoReceta');
    }
}
