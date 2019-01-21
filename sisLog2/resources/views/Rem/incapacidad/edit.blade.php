@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Extension de Incapacidad: {{$incapacidad->nombrePaciente}}</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($incapacidad,['method'=>'PATCH','route'=>['clinica.incapacidad.update',$incapacidad->idIncapacidad]])!!}

            {{Form::token()}}

    		
            <div class="form-group">
            <label for="nombrePaciente">Nombre de Paciente</label>  
            <select name ="nombrePaciente" id="input" class="form-control" >
                <option value="{{$incapacidad->nombrePaciente}}">{{$incapacidad->nombrePaciente}}</option>>
             @foreach($pacientes as $paciente)
                <?php if( ($paciente['nombre']) != ($incapacidad->nombrePaciente) ): ?>
                <option value="{{$paciente['nombre']}}"> {{$paciente['nombre']}} </option>
                <?php endif; ?>
                
             @endforeach  

             </select>
            </div>

            <div class="form-group">
            <label for="medicoAsignado">Medico Asignado</label>  
            <select name ="medicoAsignado" id="input" class="form-control">
                <option value="{{$incapacidad->medicoAsignado}}">{{$incapacidad->medicoAsignado}}</option>>
             @foreach($medicos as $medico)
                <?php if( ($medico['nombre']) != ($incapacidad->medicoAsignado) ): ?>
                <option value="{{$medico['nombre']}}"> {{$medico['nombre']}} </option>
                <?php endif; ?>                
                
             @endforeach  

             </select>
             </div>
              <div class="form-group">
                <label for="edadPaciente">Edad del Paciente </label>
                    <input type="number" name="edadPaciente" min="0" max="150" step="1" value="{{$incapacidad->edadPaciente}}">
                </div>
             
            <div class="form-group">
                        <label for="causaPaciente" class="required">Causa de la Incapacidad</label>
                        <textarea name="causaPaciente" value="{{$incapacidad->causaPaciente}}"  rows="2.5" cols="20" name="causaPaciente" class="form-control">{{$incapacidad->causaPaciente}}    
                        </textarea>
                    </div>
             <div class="form-group">
                <label for="diasIncapacidad">Dias de Incapacidad </label>
                    <input type="number" name="diasIncapacidad" min="0" max="150" step="1" value="{{$incapacidad->diasIncapacidad}}">
                </div>
                    

            <div class="form-group">
                <label for="fechaIncapacidad">Fecha del Control realizado</label>
                <input type="text" name="fechaIncapacidad" class="form-control" value="{{$now->format('d/m/Y')}}"> 
            </div>
            <div class="form-group">
                <label for="horaIncapacidad">Hora del Control realizado</label>
                <input type="time" name="horaIncapacidad" class="form-control" value="{{$now->format('H:i')}}"> 
            </div>

    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
   <a href="{{URL::action('IncapacidadController@index')}}"><button class="btn btn-info">Ver Listado de Incapacidades</button></a>
   
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
        swal("Error", "En el Procesamiento", "warning");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif