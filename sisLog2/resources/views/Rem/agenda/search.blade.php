{!! Form::open(array('url'=>'Rem/agenda','method'=>'GET','autocomplete'=>'of','role'=>'search')) !!}


<div class="form-group">
	<div class="input-group">
		<input type="text" class="form-control" name="searchText"  value="{{$searchText}}">
		<span class="input-group-btn">
			<button type="submit" class="btn btn-primary">Buscar Servicio</button>
		</span>
		</span>
	</div>
	
</div>

{{Form::close()}}