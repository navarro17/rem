@extends ('layouts.admin')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Crear Nueva Consulta</h3>
            <a href="consulta/create"><button class="btn btn-success">Crear Nueva Consulta</button></a>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Buscar Paciente</h3>
            
            <h3>Listado de consulta de paciente</h3>
            @include('clinica.consulta.search')
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Apellido</th>
                        <th>Nombre</th>
                        <th>Consulta</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($pacientes as $paci)
                    <tr>
                        <td>{{ $paci->idConsulta}}</td>
                        <td>{{ $paci->apellido}}</td>
                        <td>{{ $paci->nombre}}</td>
                        <td>{{ $paci->nombreConsulta}}</td>
                        <td>
						
                        <a href="{{URL::action('ConsultaController@edit', $paci->idConsulta)}}"><button class="btn btn-info">Editar</button></a>   
                        <a href="" data-target="#modal-delete-{{$paci->idConsulta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>   
                        </td>
                    </tr>
                    @include('clinica.consulta.modal')
                    @endforeach
                </table>
            </div>
            
            <hr>
            &nbsp
            <a href="{{ url('/clinica') }}"><button class="btn btn-danger">Regresar</button></a>
        </div>
    </div>


@endsection