<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;

use sisLog2\User;
use Illuminate\Support\Facades\Redirect;
use sisLog2\Http\Requests\UsuarioFormRequest;
use sisLog2\Http\Requests\UsuarioFormRequest2;
use DB;

class UsuarioController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
    	$query=trim($request->get('searchText'));
    	$usuarios=DB::table('users')->where('name','LIKE', '%'.$query.'%')
    	->orderBy('id','asc')
    	->paginate(7);
    	return view('seguridad.usuario.index',["usuarios"=>$usuarios,"searchText"=>$query]);

    }

    public function create()
     {
     	return view("seguridad.usuario.create");
     }


    public function store(UsuarioFormRequest $request)
    {
    	$usuario=new User;
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
        $usuario->tipoUsuario=$request->get('idtipo');
    	if($usuario->save()){

            return back()->with('msj','Datos Guardados');
        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }

    	return Redirect::to('seguridad/usuario');
    }

    public function edit($id)
    {
    	return view("seguridad.usuario.edit",["usuario"=>User::findOrFail($id)]);
    }

    public function update(UsuarioFormRequest2 $request, $id)
    {
    	$usuario=User::findOrFail($id);
    	$usuario->name=$request->get('name');
    	$usuario->email=$request->get('email');
    	$usuario->password=bcrypt($request->get('password'));
        $usuario->tipoUsuario=$request->get('idtipo');
    	if($usuario->update()){
             return back()->with('msj','Datos Guardados');

        }else{

            return back()->with('errormsj','Los datos no se guardaron');
        }
    	return Redirect::to('seguridad/usuario');

    }

    public function destroy($id)
    {
    	$usuario = DB::table('users')->where('id','=', $id)->delete();
        return back()->with('msj','Datos Guardados');
        return Redirect::to('seguridad/usuario');
    }

}
