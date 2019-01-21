<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Receta;
use sisLog2\Paciente;
use sisLog2\Medico;
use sisLog2\TipoSangre;
use PDF;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\RecetaFormRequest;
use DB;

class RecetaController extends Controller
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
            $pacientes=DB::table('paciente')->where('apellido','LIKE','%'.$query.'%')
            ->orderBy('idPaciente','desc')
            ->paginate(7);
            return view('clinica.receta.index',["pacientes"=>$pacientes,"searchText"=>$query,]);
        }
    }
/**
    public function create($id)
    {
        //$tipooSangre = TipoSangre::all();
        //$tipooSangre=DB::table('tiposangre')
        //return view("clinica.paciente.create",["tipooSangre"=>$tipooSangre]);
    	//return view("clinica.paciente.create", [compact('tipooSangre')]);
        //return view("clinica.paciente.create")->with('tipooSangre',$tipooSangre);
        return view("clinica.receta.create",["paciente"=>Paciente::findOrFail($id)]); 
    }**/
/** **/
    /**public function store(RecetaFormRequest $request)
    {
        $receta = new Receta;
        $receta->indicaciones=$request->get('indicaciones');
        $receta->save();
        
        return Redirect::to("clinica.receta.edit");
        /**
    	$paciente = new Paciente;
    	$paciente->nombre=$request->get('nombre');
    	$paciente->apellido=$request->get('apellido'); 
    	$paciente->telefono=$request->get('telefono');
        $paciente->tipoSangre=$request->get('tipoSangre');
        $paciente->direccion=$request->get('direccion');
        $paciente->fechaNacimiento=$request->get('fechaNacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->estadoCivil=$request->get('estadoCivil');
    	$paciente->save();

    	return Redirect::to('clinica/paciente');
        **/
 /**   } **/
/**
    public function show($id)
    {
    	return view("clinica.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }**/

    public function edit($id)
    {
        $now = Carbon::now();
        $medico = Medico:: all();
    	return view("clinica.receta.edit",["paciente"=>Paciente::findOrFail($id)])->with('now',$now)->with('medico',$medico);
    }

    public function show($id)
    {
        //$paciente=Paciente::findOrFail($id);
        $receta=Receta::findOrFail($id);
        $medico = Medico:: all();
        $pdf = PDF::loadView("clinica.receta.recetaPDF",["receta"=>$receta],["medico"=>$medico]);
        return $pdf->stream($receta->nombrePaciente);
        //return view("clinica.receta.imprimir",["paciente"=>Paciente::findOrFail($id)])->with('now',$now);
    }

    public function imprimir()
    {
        return view("clinica.receta.imprimir");
        //$pdf = PDF::loadView("clinica.receta.imprimir");
        //return $pdf->download('archivo.pdf');
        //return view("clinica.receta.imprimir",["paciente"=>Paciente::findOrFail($id)])->with('now',$now);
    }
/** **/
    public function update(RecetaFormRequest $request,$id)
    {
        /**
    	$paciente=Paciente::findOrFail($id);
    	$paciente->nombre=$request->get('nombre');
        $paciente->apellido=$request->get('apellido'); 
        $paciente->telefono=$request->get('telefono');
        $paciente->tipoSangre=$request->get('tipoSangre');
        $paciente->direccion=$request->get('direccion');
        $paciente->fechaNacimiento=$request->get('fechaNacimiento');
        $paciente->sexo=$request->get('sexo');
        $paciente->estadoCivil=$request->get('estadoCivil');
    	$paciente->update();
        **/  
        $receta = new Receta;
        $receta->nombrePaciente=$request->get('nombrePaciente');
        $receta->indicaciones=$request->get('indicaciones');
        $receta->fecha=$request->get('fecha');
        $receta->idMedico=$request->get('idMedico');
        $receta->idPaciente=$request->get('idPaciente');
        $receta->medicamentos=$request->get('medicamentos');
        $receta->save();
        $medico = Medico:: all();
        
    	//return Redirect::to('clinica.receta.edit');
        return view("clinica.receta.edit1",["paciente"=>Paciente::findOrFail($id), "receta"=>$receta])->with('medico',$medico);
    }  

    public function destroy($id)
    {
    	$receta=Receta::findOrFail($id);
    	$receta->delete();

    	return Redirect::to('clinica/receta');
    }
}
