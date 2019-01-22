@extends ('layouts.admin')
@section('contenido')

<div class="row" id="crCita">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Crear Nuevo Servicio</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'Rem/agenda','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            <div class="form-group">
                <label for="nombreEmpresa" class="required">Nombre de la Empresa a Prestar Servicio</label>
                <textarea name="nombreEmpresa" value="{{old('nombreEmpresa')}}"  rows="2.5" cols="20" name="nombreEmpresa" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="tipoServicio" class="required">Tipo de Servicio a Brindar</label>
                <select name="tipoServicio" id="input" class="form-control" value="{{ old('tipoServicio') }}">
                    <option value="">Seleccione el tipo de Servicio</option>
                    <option value="Mantenimiento de Antenas">Mantenimiento de Antenas</option>
                    <option value="Medicion de Paramentros">Medicion de Paramentros</option>
                    <option value="Colocacion de Antenas">Colocacion de Antenas</option>
                    <option value="Evaluacion de Equipos">Evaluacion de Equipos</option>
                    <option value="Instalacion de Equipos">Instalacion de Equipos</option>
                </select>
            </div>
            <div class="form-group">
                <label for="descripcionServicio" class="required">Descripcion del Servicio</label>
                <textarea name="descripcionServicio" value="{{old('descripcionServicio')}}"  rows="2.5" cols="20" name="descripcionServicio" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="fechaServicio" class="required">Fecha del Servicio</label>
                <input type="date" value="{{old('fechaServicio')}}" name="fechaServicio" class="form-control" placeholder="fecha del Servicio...">    
            </div>
            <div class="form-group">
                <label for="horaServicio" class="required">Hora del Servicio</label>
                <input type="time" value="{{old('horaServicio')}}" name="horaServicio" class="form-control" placeholder="00:00:00">   
            </div>

            <div class="form-group">
                <label for="reservacionAgenda" class="required">Reservar Servicio</label>
                <br>
                <input type="radio" name="reservacionAgenda" value="1">Si<br>
                <input type="radio" name="reservacionAgenda" value="0">No <br>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}

        </div>
   </div>

 <a href="{{URL::action('AgendaController@index')}}"><button class="btn btn-info">Ver Listado de Servicios</button></a>
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