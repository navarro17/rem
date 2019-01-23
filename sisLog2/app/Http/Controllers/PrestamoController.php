<?php
namespace sisLog2\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use sisLog2\Http\Requests;
use sisLog2\Prestamo;
use sisLog2\Tecnico;
use sisLog2\Proyecto;
use sisLog2\Articulo;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\PrestamoFormRequest;
use DB;

class PrestamoController extends Controller
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
            $prestamo=DB::table('prestamo')->join('proyecto','proyecto.idProyecto','=','prestamo.idProyecto')
            ->join('tecnico','tecnico.idTecnico','=','prestamo.idTecnico')
            //->join('articulo','articulo.idArticulo','=','prestamo.idArticulo')
            ->Where('tecnico.nomtec','LIKE','%'.$query.'%')
            ->orWhere('tecnico.apellido','LIKE','%'.$query.'%')
            ->orWhere('proyecto.nombre','LIKE','%'.$query.'%')
            ->orderBy('idPrestamo','desc')
            ->paginate(7);
            return view('Rem.prestamo.index',["prestamo"=>$prestamo,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $tecnicos=Tecnico::all();
        $proyectos=Proyecto::all();
        $pre = new Prestamo;
        $now=Carbon::now();

    	return 
    	view("Rem.prestamo.create",["tecnicos"=>$tecnicos],["proyectos"=>$proyectos],["pre"=>$pre])->with('now',$now);
    }

    public function store(PrestamoFormRequest $request)
    {
    	$prestamo = new Prestamo;
    	
        $prestamo->idArticulo=$request->get('idArticulo');
        $prestamo->idProyecto=$request->get('idProyecto');
        $prestamo->idTecnico=$request->get('idTecnico');
        $prestamo->fecha=$request->get('fecha');
        
       
        
        if($prestamo->save()){

            return back()->with('msj','Datos Guardados');
           
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	
    }

    public function show($id)
    {
        $prestamo=Prestamo::findOrFail($id);
        $pdf = PDF::loadView("Rem.prestamo.vista",["prestamo"=>$prestamo]);
        return $pdf->stream($prestamo->idPrestamo);
        
    }




    public function edit($id)

    {
        $now=Carbon::now();
        
    	return view("Rem.prestamo.edit",["prestamo"=>Prestamo::findOrFail($id)])->with('now',$now);
    }

    public function update(ArticuloFormRequest $request,$id)
    {
    	$prestamo=Prestamo::findOrFail($id);
        $prestamo->idArticulo=$request->get('idArticulo');
        $prestamo->idProyecto=$request->get('idProyecto');
        
        $prestamo->idTecnico=$request->get('idTecnico');
        $prestamo->fecha=$request->get('fecha');
        //$articulo->altura=$request->get('altura');
        //$prestamo->cantidad=$request->get('cantidad');
        //$articulo->modelo=$request->get('modelo');
        //$articulo->dimensiones=$request->get('dimensiones');
        //$articulo->fabricante=$request->get('fabricante');
        //$articulo->tipoArticulo=$request->get('tipoArticulo');
        //$articulo->descripcion=$request->get('descripcion');
        //$articulo->montaje=$request->get('montaje');
        //$articulo->tipoLinea=$request->get('tipoLinea');
        if($prestamo->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	
    }


    public function destroy($id)
    {
    	$prestamo=Prestamo::findOrFail($id);
          if($prestamo->delete()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	
    }

    
}
