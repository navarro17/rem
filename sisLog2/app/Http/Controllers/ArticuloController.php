<?php
namespace sisLog2\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use sisLog2\Http\Requests;
use sisLog2\Articulo;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\ArticuloFormRequest;
use DB;

class ArticuloController extends Controller
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
            $articulo=DB::table('articulo')->where('modelo','LIKE','%'.$query.'%')
            ->orWhere('idArticulo','LIKE','%'.$query.'%')
            
            
            ->orWhere('fabricante','LIKE','%'.$query.'%')
            ->orWhere('tipoArticulo','LIKE','%'.$query.'%')
           
            ->orWhere('descripcion','LIKE','%'.$query.'%')
            
            ->orderBy('idArticulo','desc')
            ->paginate(7);
            return view('Rem.articulo.index',["articulo"=>$articulo,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	
        

        $now=Carbon::now();
    	return 
    	view("Rem.articulo.create")->with('now',$now);
    }

    public function store(ArticuloFormRequest $request)
    {
    	$articulo = new Articulo;
    	
        $articulo->cantidad=$request->get('cantidad');
        $articulo->modelo=$request->get('modelo');
        
        $articulo->fabricante=$request->get('fabricante');
        $articulo->tipoArticulo=$request->get('tipoArticulo');
        $articulo->descripcion=$request->get('descripcion');
       
        if($articulo->save()){

            return back()->with('msj','Datos Guardados');
           
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	
    }

    public function show($id)
    {
        $articulo=Articulo::findOrFail($id);
        $pdf = PDF::loadView("Rem.articulo.vista",["articulo"=>$articulo]);
        return $pdf->stream($articulo->idArticulo);
        
    }




    public function edit($id)

    {
        $now=Carbon::now();
        
    	return view("Rem.articulo.edit",["articulo"=>Articulo::findOrFail($id)])->with('now',$now);
    }

    public function update(ArticuloFormRequest $request,$id)
    {
    	$articulo=Articulo::findOrFail($id);
        
        $articulo->cantidad=$request->get('cantidad');
        $articulo->modelo=$request->get('modelo');
       
        $articulo->fabricante=$request->get('fabricante');
        $articulo->tipoArticulo=$request->get('tipoArticulo');
       
        $articulo->descripcion=$request->get('descripcion');
        
        if($articulo->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	
    }


    public function destroy($id)
    {
    	$articulo=Articulo::findOrFail($id);
          if($articulo->delete()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	
    }
}
