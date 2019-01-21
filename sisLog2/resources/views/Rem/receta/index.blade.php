@extends ('layouts.admin')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Buscar Paciente</h3>
            @include('clinica.receta.search')
            <hr>
            <h3>Listado de Expediente de paciente</h3>
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
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($pacientes as $paci)
                    <tr>
                        <td>{{ $paci->idPaciente}}</td>
                        <td>{{ $paci->apellido}}</td>
                        <td>{{ $paci->nombre}}</td>
                        <td>{{ $paci->telefono}}</td>
                        <td>{{ $paci->direccion}}</td>
                        <td>
                            <a href="{{URL::action('RecetaController@edit', $paci->idPaciente)}}"><button class="btn btn-info">Crear Receta</button></a>
                            
                        </td>
                    </tr>
                    
                    @endforeach
                </table>
            </div>
            {{$pacientes->render()}}
            <hr>
            <a href="{{ url('/clinica/infoReceta') }}"><button class="btn btn-info">Ver Recetas</button></a>
            &nbsp
            <a href="{{ url('/clinica') }}"><button class="btn btn-danger">Regresar</button></a>
        </div>
    </div>


@endsection