@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Articulo: {{$articulo->idArticulo}}</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($articulo,['method'=>'PATCH','route'=>['Rem.articulo.update',$articulo->idArticulo]])!!}

            {{Form::token()}}

    		
            
            <div class="form-group">
                <label for="tipoArticulo">Nombre</label>
                <input type="text" name="tipoArticulo" class="form-control" value="{{$articulo->tipoArticulo}}" placeholder="nombre del articulo...">  
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad</label>
                <input type="text" name="cantidad" class="form-control" value="{{$articulo->cantidad}}" placeholder="Cantidad...">  
            </div>
            <div class="form-group">
                        <label for="modelo" class="required">Modelo</label>
                        <textarea name="modelo" value="{{$articulo->modelo}}"  rows="2.5" cols="20" name="modelo" class="form-control">{{$articulo->modelo}}    
                        </textarea>
                    </div>
            
            <div class="form-group">
                        <label for="fabricante" class="required">Fabricante</label>
                        <textarea name="fabricante" value="{{$articulo->fabricante}}"  rows="2.5" cols="20" name="fabricante" class="form-control">{{$articulo->fabricante}}    
                        </textarea>
                    </div>
            <div class="form-group">
                        <label for="descripcion" class="required">Descripcion</label>
                        <textarea name="descripcion" value="{{$articulo->descripcion}}"  rows="2.5" cols="20" name="descripcion" class="form-control">{{$articulo->descripcion}}    
                        </textarea>
                    </div>
            

             
             

    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
   <a href="{{URL::action('ArticuloController@index')}}"><button class="btn btn-info">Ver Listado de Articulos</button></a>
   
@endsection



@if(session()->has('msj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rem</title>
</head>
<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        swal("Procesamiento", "Ejecutado Exitosamente", "success");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif

@if(session()->has('errormsj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rem</title>
</head>
<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        swal("Error", "En el Procesamiento", "warning");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif