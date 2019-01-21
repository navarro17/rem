@extends ('layouts.admin')
@section ('contenido')
{!!Form::model($paciente,['method'=>'PATCH','route'=>['clinica.receta.update',$paciente->idPaciente]])!!}
{{Form::token()}}

<div class="form-horizontal">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="nombrePaciente" class="col-sm-3 required">Nombre Paciente:</label>
			<div class="col-sm-8">
				<input type="text" value="{{$paciente->apellido}}, {{$paciente->nombre}}" name="nombrePaciente" class="form-control" readonly=”readonly”>
			</div>
		</div>

		<div class="form-group">
			<label for="idMedico" class="col-sm-3 required" class="required">Doctor:</label>
			<div class="col-sm-8">
				<select name= "idMedico" id="idMedico" class="form-control">
				<option selected value="" >Seleccione una opcion</option>
                    @foreach ($medico as $medico)
                        <option value="{{$medico ['idMedico']}}">{{$medico ['nombre']}}
                        </option>
                    @endforeach 
                </select>
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group">
			<label for="" class="col-sm-3 required">Edad:</label>
				<div class="col-sm-8">
					<?php
					function obtener_edad_fecha_nacimiento($fecha_nac){
                        $fecha_nac = strtotime($fecha_nac);
                        $edad = date('Y', $fecha_nac);
                        if (($mes = (date('m') - date('m', $fecha_nac))) < 0) {
                        $edad++;
                        } elseif ($mes == 0 && date('d') - date('d', $fecha_nac) < 0) {
                        $edad++;
                        }
                        return date('Y') - $edad;
                    }
					?>
				<input type="text" name="" value="<?php echo obtener_edad_fecha_nacimiento($paciente->fechaNacimiento); ?>" class="form-control" readonly=”readonly”>
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 required">Sexo:</label>
				<div class="col-sm-8">
				<input type="text" value="{{$paciente->sexo}}"  name="" class="form-control" readonly=”readonly”>
			</div>
		</div>

		<div class="form-group">
		</div>
		<div class="form-group">
		</div>
	</div>	
</div>



<div class="form-horizontal" style="background-color: yellow">
	<div class="col-sm-6">
		<div class="form-group">
			<label for="medicamentos" class="col-sm-3 required" class="required">Medicamentos:</label>
			
				<textarea class="form-control" rows="10" placeholder="Escriba el medicamentos" name="medicamentos"></textarea>
			
		</div>

		<div class="form-group">
			<label for="fecha" class="col-sm-3 required">Fecha:</label>
			<div class="col-sm-8">
				<input type="text" name="fecha" class="form-control" value="{{$now->format('d/m/Y  h:i  A')}}" readonly=”readonly”>
			</div>
		</div>

		
	</div>

	<div class="col-sm-6">
		<div class="form-group">
			<label for="indicaciones" class="col-sm-3 required" class="required">Indicaciones:</label>
			
				<textarea class="form-control" rows="10" placeholder="Escriba las indicaciones de la receta medica" name="indicaciones"></textarea>
			
		</div>

		<div class="form-group">
			<label for="idPaciente" class="col-sm-3 required">Numero de paciente:</label>
			<div class="col-sm-8">
				<input type="text" value="{{$paciente->idPaciente}}"  name="idPaciente" class="form-control" readonly=”readonly”>
			</div>
		</div>
	</div>
</div>

<hr>
		<div class="form-group">
			<button class="btn btn-primary" type="submit">guardar</button>
		</div>
		
{!!Form::close()!!}
<a href="{{ url('/clinica/receta') }}"><button class="btn btn-danger">Regresar</button></a>
@endsection