@extends ('layouts.admin')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Buscar Receta Nombre Paciente</h3>
            @include('clinica.infoReceta.search')
            <hr>
            <h3>Listado de Receta Medica</h3>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>nombrePaciente</th>
                        <th>fecha</th>
                        
                        <th>Opciones</th>
                    </thead>
                    @foreach ($recetas as $rece)
                    <tr>
                        <td>{{ $rece->idReceta}}</td>
                        <td>{{ $rece->nombrePaciente}}</td>
                        <td>{{ $rece->fecha}}</td>
                        <td>
                            <a href="{{URL::action('InforeceController@show', $rece->idReceta)}}"><button class="btn btn-warning">Ver</button></a>
                            <a href="{{URL::action('InforeceController@edit', $rece->idReceta)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$rece->idReceta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.infoReceta.modal')
                    @endforeach
                </table>
            </div>
            {{$recetas->render()}}
            <hr>
            <a href="{{ url('/clinica/receta') }}"><button class="btn btn-danger">Regresar</button></a>
            &nbsp
            
        </div>
    </div>


@endsection