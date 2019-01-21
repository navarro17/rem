@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Crear Nuevo Medico</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'clinica/medico','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombre" class="required">Nombre</label>
                <input type="text" value="{{old('nombre')}}"name="nombre" class="form-control" placeholder="Nombre...">  
            </div>
            <div class="form-group">
                <label for="especialidad" class="required">Especialidad</label>
                <input type="text" value="{{old('especialidad')}}" name="especialidad" class="form-control" placeholder="Especialidad...">    
            </div>
            <div class="form-group">
                <label for="telefono" class="required">Telefono</label>
                <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control" placeholder="Telefono...">    
            </div>
            <div class="form-group">
                <label for="correo" class="required">Correo</label>
                <input type="text" value="{{old('correo')}}" name="correo" class="form-control" placeholder="Correo...">    
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" value="{{old('direccion')}}" name="direccion" class="form-control" placeholder="Direccion...">    
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}

        </div>
   </div>
   <a href="{{URL::action('MedicoController@index')}}"><button class="btn btn-info">Ver Listado de Medicos</button></a>
@endsection
@if(session()->has('msj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Clinica Medica Betel</title>
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
    <title>Clinica Medica Betel</title>
</head>
<body>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        swal("Error", "En el Procesamiento", "error");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif