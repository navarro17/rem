@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
    	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
    		<h3>Editar Expediente de Paciente: {{$paciente->apellido}}</h3>
    		@if (count($errors)>0)
    		<div class="alert alert-danger">
    			<ul>
    			@foreach ($errors->all() as $error)
    				<li>{{$error}}</li>
    			@endforeach	
    			</ul>	
    		</div>
    		@endif

    		{!!Form::model($paciente,['method'=>'PATCH','route'=>['clinica.paciente.update',$paciente->idPaciente]])!!}
    		{{Form::token()}}

    		<div class="form-group">
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{$paciente->apellido}}" placeholder="Apellido...">  
            </div>
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$paciente->nombre}}" placeholder="Nombre...">  
            </div>
            <div class="form-group">
                <label for="telefono">Telefono</label>
                <input type="text" name="telefono" class="form-control" value="{{$paciente->telefono}}" placeholder="Ejemplo 0000 0000" pattern="[0-9]{4}[ ]{1}[0-9]{4}">    
            </div>
            <div class="form-group">
                <label for="direccion">Direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{$paciente->direccion}}" placeholder="Direccion...">    
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" name="fechaNacimiento" class="form-control" value="{{$paciente->fechaNacimiento}}" placeholder="fecha de Nacimiento..."> 

            </div>
            <div class="form-group">
                <label for="tipoSangre" class="required">Tipo de Sangre</label>
                <div>
                    <select class="custom-select" name="tipoSangre" value="{{$paciente->tipoSangre}}" id="paciente">
                    
                    <option value="O psitivo" <?php if($paciente->tipoSangre=="O positivo") echo "selected" ?>>O positivo</option>
                    <option value="O negativo" <?php if($paciente->tipoSangre=="O negativo") echo "selected" ?>>O negativo</option>  
                    <option value="B RH positivo" <?php if($paciente->tipoSangre=="B RH positivo") echo "selected" ?>>B RH positivo</option> 
                    <option value="B RH negativo" <?php if($paciente->tipoSangre=="B RH negativo") echo "selected" ?>>B RH negativo</option>
                    <option value="AB positivo" <?php if($paciente->tipoSangre=="AB positivo") echo "selected" ?>>AB positivo</option> 
                    <option value="AB negativo" <?php if($paciente->tipoSangre=="AB negativo") echo "selected" ?>>AB negativo</option> 
                    </select>
                </div>       
            </div>
            <div class="form-group">
                <label for="sexo" class="required">Sexo</label>
                <div>
                    <select class="gris_normal" name="sexo" value="{{$paciente->sexo}}" id="paciente">
                        
                        <option value="Femenino" <?php if($paciente->sexo=="Femenino") echo "selected"?>>Femenino</option>
                    
                    <option value="Masculino" <?php if($paciente->sexo=="Masculino") echo "selected"?>>Masculino</option>
                    
                    </select> 
                </div>   
            </div>
             <div class="form-group">
                <label for="estadoCivil" class="required">Estado Civil</label>
                <div>
                    <select class="custom-select" name="estadoCivil" value="{{$paciente->estadoCivil}}" id="paciente">
                    <option value="Soltero/a" <?php if($paciente->estadoCivil=="Soltero/a") echo "selected" ?>>Soltero/a</option> 
                    <option value="Casado/a" <?php if($paciente->estadoCivil=="Casado/a") echo "selected" ?>>Casado/a</option>
                     <option value="Acompanado/a" <?php if($paciente->estadoCivil=="Acompaniado/a") echo "selected" ?>>Acompaniado/a</option>
                    <option value="viudo/a" <?php if($paciente->estadoCivil=="Viudo/a") echo "selected" ?>>Viudo/a</option>
                    <option value="Divorsiado/a" <?php if($paciente->estadoCivil=="Divorsiado/a") echo "selected" ?>>Divorsiado/a</option>
                    
                </select>  
                </div> 
                </div>

    		<div class="form-group">
    			<button class="btn btn-primary" type="submit">Guardar</button>
    			<button class="btn btn-danger" type="reset">Cancelar</button>
    		</div>
    		{!!Form::close()!!}

    	</div>
   </div>
   <a href="{{URL::action('PacienteController@index')}}"><button class="btn btn-info">Ver Listado de Pacientes</button></a>
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