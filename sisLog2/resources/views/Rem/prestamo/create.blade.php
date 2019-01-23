@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Agregar un nuevo Prestamo</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'Rem/prestamo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

        


            <div class="form-group">
            <label for="idTecnico">Tecnico</label>  
            <select name ="idTecnico" id="input" class="form-control" value="{{old('idTecnico')}}">
                <option value="">--Escoja el Tecnico--</option>>
             @foreach($tecnicos as $tecnico)
                <option value="{{$tecnico['idTecnico']}}"> {{$tecnico['nomtec']}}
                </option>
             @endforeach 
             </select>
             </div>
             



            <div class="form-group">
               
            <label for="idProyecto">Proyecto</label>  
            <select name ="idProyecto" id="input" class="form-control" value="{{old('idProyecto')}}">
                <option value="">--Escoja el Proyecto--</option>

             @foreach($proyectos as $proyecto)
                <option value="{{$proyecto['idProyecto']}}"> {{$proyecto['nombre']}}
                </option>
             @endforeach
             </select> 
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
  <a href="{{URL::action('PrestamoController@index')}}"><button class="btn btn-info">Ver Listado de Prestamos</button></a>
   
   
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
