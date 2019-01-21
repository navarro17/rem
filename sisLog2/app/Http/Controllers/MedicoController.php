<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use sisLog2\Medico;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\MedicoFormRequest;
use DB;

class MedicoController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $medicos=DB::table('medico')->where('nombre','LIKE','%'.$query.'%')
            ->orWhere('idMedico','LIKE','%'.$query.'%')
            ->orWhere('especialidad','LIKE','%'.$query.'%')
            ->orWhere('telefono','LIKE','%'.$query.'%')
            ->orWhere('correo','LIKE','%'.$query.'%')
            ->orWhere('direccion','LIKE','%'.$query.'%')
            ->orderBy('idMedico','desc')
            ->paginate(7);
            return view('clinica.medico.index',["medicos"=>$medicos,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	return view("clinica.medico.create"); 
    }

    public function store(MedicoFormRequest $request)
    {
    	$medico = new Medico;
    	$medico->nombre=$request->get('nombre');
    	$medico->especialidad=$request->get('especialidad'); 
    	$medico->telefono=$request->get('telefono');
        $medico->correo=$request->get('correo');
        $medico->direccion=$request->get('direccion');
    	if($medico->save()){

           return back()->with('msj','Datos Guardados');

        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	return Redirect::to('clinica/medico');

    }

    public function show($id)
    {
    	return view("clinica.medico.show",["medico"=>Medico::findOrFail($id)]);
    }

    public function edit($id)
    {
    	return view("clinica.medico.edit",["medico"=>Medico::findOrFail($id)]);
    }

    public function update(MedicoFormRequest $request,$id)
    {
    	$medico=Medico::findOrFail($id);
    	$medico->nombre=$request->get('nombre');
        $medico->especialidad=$request->get('especialidad'); 
        $medico->telefono=$request->get('telefono');
        $medico->correo=$request->get('correo');
        $medico->direccion=$request->get('direccion');
    	if($medico->update()){
           
           return back()->with('msj','Datos Guardados');

        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	return Redirect::to('clinica/medico');
    }

    public function destroy($id)
    {
    	$medico=Medico::findOrFail($id);

    	if($medico->delete()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	return Redirect::to('clinica/medico');
    }
}
