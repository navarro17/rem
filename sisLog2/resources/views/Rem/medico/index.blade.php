@extends ('layouts.administrador')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Medico/Doctor <a href="medico/create"><button class="btn btn-success">Nuevo</button></a></h3>
            @include('clinica.medico.search')
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Direccion</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($medicos as $med)
                    <tr>
                        <td>{{ $med->idMedico}}</td>
                        <td>{{ $med->nombre}}</td>
                        <td>{{ $med->especialidad}}</td>
                        <td>{{ $med->telefono}}</td>
                        <td>{{ $med->correo}}</td>
                        <td>{{ $med->direccion}}</td>
                        <td>
                            <a href="{{URL::action('MedicoController@edit', $med->idMedico)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="" data-target="#modal-delete-{{$med->idMedico}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.medico.modal')
                    @endforeach
                </table>
            </div>
            {{$medicos->render()}}

            <hr>
            &nbsp
            <a href="{{ url('/seguridad') }}"><button class="btn btn-danger">Regresar</button></a>
        </div>
    </div>


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