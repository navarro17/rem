{!! Form::open(array('url'=>'clinica/cita','method'=>'GET','autocomplete'=>'of','role'=>'search')) !!}


<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText" placeholder="Buscar por nombre de paciente" value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar</button>
		</span>
		</span>
	</div>
	
</div>

{{Form::close()}}