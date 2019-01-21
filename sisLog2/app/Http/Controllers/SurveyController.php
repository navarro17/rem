<?php
namespace sisLog2\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;
use sisLog2\Http\Requests;
use sisLog2\Survey;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\SurveyFormRequest;
use DB;

class SurveyController extends Controller
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
            $survey=DB::table('survey')->where('tipoSitio','LIKE','%'.$query.'%')
            ->orWhere('idSurvey','LIKE','%'.$query.'%')
            ->orWhere('coordenadas','LIKE','%'.$query.'%')
            ->orWhere('acceso','LIKE','%'.$query.'%')
            ->orWhere('shelter','LIKE','%'.$query.'%')
            ->orWhere('torreTipo','LIKE','%'.$query.'%')
            ->orWhere('areasAdyacentes','LIKE','%'.$query.'%')
            ->orWhere('fechaSurvey','LIKE','%'.$query.'%')
            ->orWhere('horaSurvey','LIKE','%'.$query.'%')
            ->orderBy('idsurvey','desc')
            ->paginate(7);
            return view('Rem.survey.index',["survey"=>$survey,"searchText"=>$query]);
        }
    }

    public function create()
    {
    	
        

        $now=Carbon::now();
    	return 
    	view("Rem.survey.create")->with('now',$now);
    }

    public function store(SurveyFormRequest $request)
    {
    	$survey = new Survey;
    	$survey->coordenadas=$request->get('coordenadas');
        $survey->tipoSitio=$request->get('tipoSitio');
        $survey->acceso=$request->get('acceso');
        $survey->shelter=$request->get('shelter');
        $survey->torreTipo=$request->get('torreTipo');
        $survey->areasAdyacentes=$request->get('areasAdyacentes');
        $survey->fechaSurvey=$request->get('fechaSurvey');
        $survey->horaSurvey=$request->get('horaSurvey');
        if($survey->save()){

            return back()->with('msj','Datos Guardados');
           
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	
    }

    public function show($id)
    {
        $survey=Survey::findOrFail($id);
        $pdf = PDF::loadView("Rem.survey.vista",["survey"=>$survey]);
        return $pdf->stream($survey->idsurvey);
        
    }




    public function edit($id)

    {
        $now=Carbon::now();
        
    	return view("Rem.survey.edit",["survey"=>Survey::findOrFail($id)])->with('now',$now);
    }

    public function update(SurveyFormRequest $request,$id)
    {
    	$survey=Survey::findOrFail($id);
        $survey->coordenadas=$request->get('coordenadas');
        $survey->tipoSitio=$request->get('tipoSitio');
        $survey->acceso=$request->get('acceso');
        $survey->shelter=$request->get('shelter');
        $survey->torreTipo=$request->get('torreTipo');
        $survey->areasAdyacentes=$request->get('areasAdyacentes');
        $survey->fechaSurvey=$request->get('fechaSurvey');
        $survey->horaSurvey=$request->get('horaSurvey');
        if($survey->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
    	
    }


    public function destroy($id)
    {
    	$survey=Survey::findOrFail($id);
          if($survey->delete()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }


    	
    }
}
