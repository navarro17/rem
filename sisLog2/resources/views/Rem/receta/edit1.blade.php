@extends ('layouts.admin')
@section ('contenido')

<hr>
<a href="{{URL::action('RecetaController@show', $receta->idReceta)}}"><button class="btn btn-warning" >Ver Reporte</button></a>
<hr>
<a href="{{ url('/clinica/receta') }}"><button class="btn btn-danger">Regresar</button></a>

@endsection