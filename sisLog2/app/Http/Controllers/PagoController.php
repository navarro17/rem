<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;
use sisLog2\Http\Requests;
use sisLog2\Pago;
use sisLog2\Paciente;
use sisLog2\TipoConsulta;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\PagoFormRequest;
use DB;

class PagoController extends Controller
{
    //
    public function __construct(){
    }

    public function index(Request $request)
    {
        if ($request)
        {
            $query=trim($request->get('searchText'));
            $pagosp=DB::table('pago')->join('paciente','paciente.idPaciente','=','pago.idPaciente')
            ->join('tipoConsulta','tipoConsulta.idTipoConsulta','=','pago.idtipoConsulta')
            ->select('idPago','paciente.nombre','tipoConsulta.nombreConsulta','estado','total','fechaEmitido')
            ->where('pago.estado','=','Pendiente')
            ->Where('paciente.nombre','LIKE','%'.$query.'%')
            ->paginate(7);

            
           
            return view('clinica.pago.index',["pagosp"=>$pagosp,"searchText"=>$query,]);
        }
    }

    public function create()
    {

    }
    
    public function store(ConsultaFormRequest $request)
    {
      
    }
   

    public function show()
    {

       // $fechaActual = date("Y/m/d");
        //$dato = explode("/", $fechaActual);
       // $mes=$dato[1]; 

        $anioA=date("Y");
        $mesA=date("m");

        $ingreso=DB::table('pago')->select(DB::raw('sum(total) as totalI'))->where('estado', '=', 'Cancelado')->first();
        $CGeneral=DB::table('pago')->select(DB::raw('sum(total) as general_count' ))->where('idTipoConsulta','=','1')->where('estado', '=', 'Cancelado')->first();
        $CNiños=DB::table('pago')->select(DB::raw('sum(total) as niños_count' ))->where('idTipoConsulta','=','2')->where('estado', '=', 'Cancelado')->first();
        $CEmb=DB::table('pago')->select(DB::raw('sum(total) as emb_count' ))->where('idTipoConsulta','=','3')->where('estado', '=', 'Cancelado')->first();
        $CDer=DB::table('pago')->select(DB::raw('sum(total) as der_count' ))->where('idTipoConsulta','=','5')->where('estado', '=', 'Cancelado')->first();
        $COft=DB::table('pago')->select(DB::raw('sum(total) as oft_count' ))->where('idTipoConsulta','=','4')->where('estado', '=', 'Cancelado')->first();


        //$pastel = DB::table('pago')->select('idTipoConsulta' , DB::raw('count(idPago) as cant'))->where('estado', '=', 'Cancelado')->groupBy('idTipoConsulta');
        $pastel=DB::select("SELECT count('idPago') as cant, tipoConsulta.nombreConsulta as tCons  FROM pago inner join tipoConsulta on pago.idTipoConsulta= tipoConsulta.idTipoConsulta where estado= 'Cancelado' GROUP BY tCons");
/**
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anioA,$mesA);
        $fecha_inicial=date("Y-m-d", strtotime($anioA."-".$mesA."-".$primer_dia) );
        $fecha_final=date("Y-m-d", strtotime($anioA."-".$mesA."-".$ultimo_dia) );
        $consultas=Pago::whereBetween('fechaEmitido', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($consultas);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($consultas as $consulta){
        $diasel=intval(date("d",strtotime($consulta->fechaEmitido) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
**/
        

        return view('clinica.pago.estadistica',["mesA"=>$mesA, "anioA"=>$anioA, "pastel"=>$pastel, "ingreso"=>$ingreso->totalI, "CGeneral"=>$CGeneral->general_count, "CNiños"=>$CNiños->niños_count, "CEmb"=>$CEmb->emb_count, "CDer"=>$CDer->der_count, "COft"=>$COft->oft_count]);
        
       // return   json_encode($data);
    }

    public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }



    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
        $usuarios=User::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($usuarios);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($usuarios as $usuario){
        $diasel=intval(date("d",strtotime($usuario->created_at) ) );
        $registros[$diasel]++;    
        }

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function edit($id)
    {
        $pago=Pago::findOrFail($id);
        
        $pago->fechaCancelado;
        
         if($pago->update()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/pago');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
        return Redirect::to('clinica/pago');
    }


    public function update(PagoFormRequest $request,$id)
    {
        
        $pago=Pago::findOrFail($id);
        $pago->estado='Cancelado';
        $pago->fechaCancelado;

        if($pago->update()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/pago');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
        
        return Redirect::to('clinica/pago');
    }


    public function destroy($id)
    {
    	$pago=Pago::findOrFail($id);
        if($pago->delete()){

            return back()->with('msj','Datos Guardados');
            return redirect('clinica/pago');
            
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

        return Redirect::to('clinica/pago');
    }


    
}
