<?php
namespace sisLog2\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use sisLog2\Http\Requests;
use sisLog2\Proyecto;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\ProyectoFormRequest;
use DB;

class ProyectoController extends Controller
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
            $proyecto=DB::table('proyecto')->where('nombre','LIKE','%'.$query.'%')
            ->orWhere('fecha','LIKE','%'.$query.'%')
            
            ->orderBy('idProyecto','desc')
            ->paginate(7);
            return view('Rem.proyecto.index',["proyecto"=>$proyecto,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	
        

        $now=Carbon::now();
    	return 
    	view("Rem.proyecto.create")->with('now',$now);
    }

    public function store(ProyectoFormRequest $request)
    {
    	$proyecto = new Proyecto;
    	
        $proyecto->nombre=$request->get('nombre');
        $proyecto->fecha=$request->get('fecha');
        
        
       
        if($proyecto->save()){

            return back()->with('msj','Datos Guardados');
           
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	
    }

    public function show($id)
    {
        $proyecto=Proyecto::findOrFail($id);
        $pdf = PDF::loadView("Rem.proyecto.vista",["proyecto"=>$proyecto]);
        return $pdf->stream($proyecto->idProyecto);
        
    }




    public function edit($id)

    {
        $now=Carbon::now();
        
    	return view("Rem.proyecto.edit",["proyecto"=>Proyecto::findOrFail($id)])->with('now',$now);
    }

    public function update(ProyectoFormRequest $request,$id)
    {
    	$proyecto=Proyecto::findOrFail($id);
        
        $proyecto->nombre=$request->get('nombre');
        $articulo->fecha=$request->get('fecha');
       
        
        
        if($proyecto->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	
    }


    public function destroy($id)
    {
    	$proyecto=Proyecto::findOrFail($id);
          if($proyecto->delete()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	
    }
}
