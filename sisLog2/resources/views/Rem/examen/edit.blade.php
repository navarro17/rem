@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Control de Examen: {{$examen->nombrePaciente}}</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($examen,['method'=>'PATCH','route'=>['clinica.examen.update',$examen->idExamen]])!!}
    		{{Form::token()}}

    		
            <div class="form-group">
            <label for="nombrePaciente">Nombre de Paciente</label>  
            <select name ="nombrePaciente" id="input" class="form-control" >
                <option value="{{$examen->nombrePaciente}}">{{$examen->nombrePaciente}}</option>>
             @foreach($pacientes as $paciente)
                <?php if( ($paciente['nombre']) != ($examen->nombrePaciente) ): ?>
                <option value="{{$paciente['nombre']}}"> {{$paciente['nombre']}} </option>
                <?php endif; ?>
                
             @endforeach  

             </select>
            </div>

            <div class="form-group">
            <label for="medicoAsignado">Medico Asignado</label>  
            <select name ="medicoAsignado" id="input" class="form-control">
                <option value="{{$examen->medicoAsignado}}">{{$examen->medicoAsignado}}</option>>
             @foreach($medicos as $medico)
                <?php if( ($medico['nombre']) != ($examen->medicoAsignado) ): ?>
                <option value="{{$medico['nombre']}}"> {{$medico['nombre']}} </option>
                <?php endif; ?>                
                
             @endforeach  

             </select>
             </div>

             <div class="form-group">
                <label for="tipoExamen">Tipo de Examen </label>
                <select name="tipoExamen" class=" form-control" >
                    <option value="{{$examen->tipoExamen}}">--Escoja el Tipo de examen--</option>
                     <option value="Sangre" <?php if($examen->tipoExamen=="Sangre") echo "selected" ?>>Sangre</option>
                     <option value="Orina" <?php if($examen->tipoExamen=="Orina") echo "selected" ?>>Orina</option>
                     <option value="Heces" <?php if($examen->tipoExamen=="Heces") echo "selected" ?>>Heces</option>
                     <option value="Hemograma" <?php if($examen->tipoExamen=="Hemograma") echo "selected" ?>>Hemograma</option>
                     <option value="Glucosa" <?php if($examen->tipoExamen=="Glucosa") echo "selected" ?>>Glucosa</option>
                     <option value="Citologia" <?php if($examen->tipoExamen=="Citologia") echo "selected" ?>>Citologia</option>

                    
                    
               </select>
            </div>
            <div class="form-group">
                <label for="resultado">Resultado de Examenes</label>
                <input type="text" name="resultado" class="form-control" value="{{$examen->resultado}}" placeholder="Resultado de Examenes..."> 
            </div>
            <div class="form-group">
                <label for="fechaControl">Fecha del Control realizado</label>
                <input type="text" name="fechaControl" class="form-control" value="{{$now->format('d/m/Y')}}"> 
            </div>
            <div class="form-group">
                <label for="horaControl">Hora del Control realizado</label>
                <input type="time" name="horaControl" class="form-control" value="{{$now->format('H:i')}}"> 
            </div>

    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
   <a href="{{URL::action('ExamenController@index')}}"><button class="btn btn-info">Ver Listado de Controles</button></a>
   
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