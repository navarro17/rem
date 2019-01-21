@extends ('layouts.administrador')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Surveys <a href="survey/create"><button class="btn btn-success">Nuevo Survey</button></a></h3>
            @include('Rem.survey.search')
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Coordenadas</th>
                        <th>Tipo de Sitio</th>
                        <th>Acceso</th>
                        <th>Shelter</th>
                        <th>Torre Tipo</th>
                        <th>Fecha de Survey</th>
                        <th>Hora de Survey</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($survey as $surv)
                    <tr>
                        <td>{{ $surv->idSurvey}}</td>
                        <td>{{ $surv->coordenadas}}</td>
                        <td>{{ $surv->tipoSitio}}</td>
                        <td>{{ $surv->acceso}}</td>
                        <td>{{ $surv->shelter}}</td>
                        <td>{{ $surv->torreTipo}}</td>
                        <td>{{ $surv->fechaSurvey}}</td>
                        <td>{{ $surv->horaSurvey}}</td>
                        <td>
                            <a href="{{URL::action('SurveyController@edit', $surv->idSurvey)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="{{URL::action('SurveyController@show', $surv->idSurvey)}}"><button class="btn btn-warning" >Reporte</button></a>
                            <a href="" data-target="#modal-delete-{{$surv->idSurvey}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Rem.survey.modal')
                    @endforeach
                </table>
            </div>
            {{$survey->render()}}
            <hr>
            &nbsp
            <a href="{{ url('/Rem') }}"><button class="btn btn-danger">Regresar</button></a>
        </div>
    </div>
    


@endsection

@if(session()->has('msj'))
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Rem</title>
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
    <title>Rem</title>
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