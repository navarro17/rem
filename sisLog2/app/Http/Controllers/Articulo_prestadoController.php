<?php
namespace sisLog2\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use sisLog2\Http\Requests;
use sisLog2\Prestamo;
use sisLog2\Articulo;
use sisLog2\Articulo_prestado;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\Articulo_prestadoFormRequest;
use DB;

class Articulo_prestadoController extends Controller
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
            $articulo_prestado=DB::table('articulo_prestado')->join('tecnico','tecnico.idTecnico','=','prestamo.idTecnico','=','articulo_prestado.idPrestamo')
            ->join('articulo','articulo.idArticulo','=','articulo_prestado.idArticulo')
            //->join('articulo','articulo.idArticulo','=','prestamo.idArticulo')
            ->Where('prestamo.fecha','LIKE','%'.$query.'%')
            ->orWhere('articulo.tipoArticulo','LIKE','%'.$query.'%')
            
            ->orderBy('idArtPre','desc')
            ->paginate(7);
            return view('Rem.articulo_prestado.index',["articulo_prestado"=>$articulo_prestado,"searchText"=>$query]);
        }
    }

    public function create()
    {
        $prestamos=Prestamo::all();
        $articulos=Articulo::all();
        
        $now=Carbon::now();

    	return 
    	view("Rem.articulo_prestado.create",["prestamos"=>$prestamos],["articulos"=>$articulos])->with('now',$now);
    }

    public function store(PrestamoFormRequest $request)
    {
    	$articulo_prestado = new Articulo_prestado;

// AQUI LO HE TOCADO
         
        

        

        $articulo_prestado->idArticulo=$request->get('idArticulo');
        $articulo_prestado->idPrestamo=$request->get('idPrestamo');
        $articulo_prestado->canArt=$request->get('canArt');
        
       
        
        if($articulo_prestado->save()){

            return back()->with('msj','Datos Guardados');
           
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	
    }

    public function show($id)
    {
        $articulo_prestado=Articulo_prestado::findOrFail($id);
        $pdf = PDF::loadView("Rem.articulo_prestado.vista",["articulo_prestado"=>$articulo_prestado]);
        return $pdf->stream($articulo_prestado->idArtPre);
        
    }




    public function edit($id)

    {
        $now=Carbon::now();
        
    	return view("Rem.articulo_prestado.edit",["articulo_prestado"=>Articulo_prestado::findOrFail($id)])->with('now',$now);
    }

    public function update(Articulo_prestadoFormRequest $request,$id)
    {
    	$articulo_prestado=Articulo_prestado::findOrFail($id);
        $articulo_prestado->idArticulo=$request->get('idArticulo');
        $articulo_prestado->idPrestamo=$request->get('idPrestamo');
        
        
        $articulo_prestado->canArt=$request->get('canArt');
        
        if($articulo_prestado->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	
    }


    public function destroy($id)
    {
    	$articulo_prestado=Articulo_prestado::findOrFail($id);
          if($articulo_prestado->delete()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	
    }

    
}
