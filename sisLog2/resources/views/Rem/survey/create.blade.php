@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Crear Nuevo Survey</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'Rem/survey','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

        
            <div class="form-group">
                <label for="coordenadas">Coordenadas</label>
                <input type="text" name="coordenadas" class="form-control" placeholder="Coordenadas...">  
                  
            </div>
            <div class="form-group">
                <label for="tipoSitio">Tipo de Sitio</label>
                <input type="text" name="tipoSitio" class="form-control" placeholder="Tipo de Sitio...">  
                  
            </div>
             <div class="form-group">
                <label for="acceso">Acceso</label>
                <input type="text" name="acceso" class="form-control" placeholder="Acceso...">  
                  
            </div>
            <div class="form-group">
                <label for="shelter">Shelter</label>
                <input type="text" name="shelter" class="form-control" placeholder="Shelter...">  
                  
            </div>
            <div class="form-group">
                <label for="torreTipo">Tipo de Torre</label>
                <input type="text" name="resultado" class="form-control" placeholder="Tipo de Torre...">  
                  
            </div>
            <div class="form-group">
                <label for="areasAdyacentes">Areas Adyacentes</label>
                <input type="text" name="areasAdyacentes" class="form-control" placeholder="Areas Adyacentes...">  
                  
            </div>
            <div class="form-group">
                <label for="montaje">Montaje</label>
                <input type="text" name="montaje" class="form-control" placeholder="Montaje...">  
                  
            </div>
             <div class="form-group">
                <label for="altura">Altura</label>
                <input type="text" name="altura" class="form-control" placeholder="Altura en metros...">  
                  
            </div>
            
            <div class="form-group">
                <label for="numeroLineas">Numero de Lineas</label>
                
                    <input type="number" name="numeroLineas" min="0" max="150" step="1" value="">
                
            </div>
            <div class="form-group">
                <label for="tipoLinea">Tipo de Linea</label>
                <input type="text" name="tipoLinea" class="form-control" placeholder="Tipo de Linea...">  
                  
            </div>
            

              <div class="form-group">
                <label for="fechaSurvey">Fecha de Survey</label>
                <input type="text" name="fechaSurvey" class="form-control" value="{{$now->format('d/m/Y')}}"> 

            </div>

            <div class="form-group">
                <label for="horaSurvey">Hora de SurveySurvey</label>
                <input type="time" name="horaSurvey" class="form-control" value="{{$now->format('H:i')}}"> 
            </div>

            

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
              
        </div>
   </div>
  <a href="{{URL::action('SurveyController@index')}}"><button class="btn btn-info">Ver Listado de Surveys</button></a>
   
   
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

