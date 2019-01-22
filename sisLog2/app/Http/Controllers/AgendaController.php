<?php

namespace sisLog2\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use sisLog2\Http\Requests;
use sisLog2\Agenda;
use sisLog2\Paciente;
use PDF;
use Calendar;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\AgendaFormRequest;
use DB;


class AgendaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if ($request)
        {
            
            $query=trim($request->get('searchText'));
            $agendas=DB::table('agenda')->where('nombreEmpresa','LIKE','%'.$query.'%')
            ->orWhere('tipoServicio','LIKE','%'.$query.'%')
            ->orWhere('fechaServicio','LIKE','%'.$query.'%')
            ->orWhere('horaServicio','LIKE','%'.$query.'%')
            ->orderBy('idAgenda','desc')
            ->paginate(7);
            
            $agendaC = Agenda::all();
            
            return view('Rem.agenda.index', ["agendas"=>$agendas, "agendaC"=>$agendaC, "searchText"=>$query]);
        }  

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        
        $now=Carbon::now();
        return view("Rem.agenda.create")->with('now',$now);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AgendaFormRequest $request)
    {
        $agenda = new Agenda;
        $agenda->nombreEmpresa=$request->get('nombreEmpresa');
        $agenda->tipoServicio=$request->get('tipoServicio');
        $agenda->descripcionServicio=$request->get('descripcionServicio');
        $agenda->fechaServicio=$request->get('fechaServicio')." ".$request->get('horaServicio');
        $agenda->horaServicio=$request->get('horaServicio');
        $agenda->reservacionAgenda=$request->get('reservacionAgenda');

        if($agenda->tipoServicio=="Mantenimiento de Antenas"){
            $agenda->color="#a34c27";
        }elseif($agenda->tipoServicio=="Medicion de Parametros"){
                $agenda->color="#0f4c0e";
            }elseif ($agenda->tipoServicio=="Colocacion de Antena") {
                $agenda->color="#0ff1d3";
            }elseif ($agenda->tipoServicio=="Evaluacion de Equipos") {
                $agenda->color="#3f8783";
            }elseif ($agenda->tipoServicio=="Instalacion de Equipos") {
                $agenda->color="#ef8e39";
            }



             if($agenda->save()){


            return back()->with('msj','Datos Guardados');
             

            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
             }

        
    }

        
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
    {
        $agenda=Agenda::findOrFail($id);
        $pdf = PDF::loadView("Rem.agenda.vista",["agenda"=>$agenda]);
        return $pdf->stream($agenda->idAgenda);
        //return view("clinica.paciente.show",["paciente"=>Paciente::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        
       return view("Rem.agenda.edit",["agenda"=>Agenda::findOrFail($id)]);
      
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AgendaFormRequest $request , $id)
    {
        $agenda=Agenda::findOrFail($id);
        $agenda->nombreEmpresa=$request->get('nombreEmpresa');
        $agenda->tipoServicio=$request->get('tipoServicio');
        $agenda->descripcionServicio=$request->get('descripcionServicio');
        $agenda->fechaServicio=$request->get('fechaServicio');
        $agenda->horaServicio=$request->get('horaServicio');
        $agenda->reservacionAgenda=$request->get('reservacionAgenda');

        if($agenda->update()){

            return back()->with('msj','Datos Guardados');
            
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
        

    }

       public function delete(){
        //Valor id recibidos via ajax
        $id = $_POST['id'];
        Agenda::destroy($id);
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agenda=Agenda::findOrFail($id);
        if($agenda->delete()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/cita');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }



        return Redirect::to('clinica/cita');
    }
}
