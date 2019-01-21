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
                <label for="coordenadas" class="required">Coordenadas</label>
                <textarea name="coordenadas" value="{{old('coordenadas')}}"  rows="2.5" cols="20" name="coordenadas" class="form-control" >    
                </textarea>
            </div>
             <div class="form-group">
                <label for="tipoSitio" class="required">Tipo de Sitio</label>
                <textarea name="tipoSitio" value="{{old('tipoSitio')}}"  rows="2.5" cols="20" name="tipoSitio" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="acceso" class="required">Acceso</label>
                <textarea name="acceso" value="{{old('acceso')}}"  rows="2.5" cols="20" name="acceso" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="shelter" class="required">Shelter</label>
                <textarea name="shelter" value="{{old('shelter')}}"  rows="2.5" cols="20" name="shelter" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="torreTipo" class="required">Tipo de Torre</label>
                <textarea name="torreTipo" value="{{old('torreTipo')}}"  rows="2.5" cols="20" name="torreTipo" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="areasAdyacentes" class="required">Areas Adyacentes</label>
                <textarea name="areasAdyacentes" value="{{old('areasAdyacentes')}}"  rows="2.5" cols="20" name="areasAdyacentes" class="form-control" >   
                </textarea>
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

