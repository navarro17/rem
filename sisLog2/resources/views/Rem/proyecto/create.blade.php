@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Agregar un nuevo Proyecto</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'Rem/proyecto','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

        

            <div class="form-group">
                <label for="nombre" class="required">Nombre</label>
                <input type="text" value="{{old('nombre')}}" name="nombre" class="form-control" placeholder="Nombre del Proyecto...">    
            </div>

             <div class="form-group">
                <label for="fecha">Fecha del prestamo</label>
                <input type="date" name="fecha" class="form-control" value="{{$now->format('d/m/Y')}}"> 

            </div>
            
  
            

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
              
        </div>
   </div>
  <a href="{{URL::action('ProyectoController@index')}}"><button class="btn btn-info">Ver Listado de Proyectos</button></a>
   
   
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