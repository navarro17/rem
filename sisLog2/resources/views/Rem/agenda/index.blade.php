@extends ('layouts.admin')

@section ('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Control de Servicios <a href="agenda/create"><button class="btn btn-success">Nuevo</button></a></h3>
    @include('Rem.agenda.search')
        </div>
    </div>

        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre de Empresa</th>
                        <th>Tipo de Servicio</th>
                        <th>Fecha-Hora del Servicio</th>
                        <th>Descripcion del Servicio</th>
                    </thead>
                    @foreach ($agendas as $agenda)
                    <tr>
                        <td>{{ $agenda->idAgenda}}</td>
                        <td>{{ $agenda->nombreEmpresa}}</td>
                        <td>{{ $agenda->tipoServicio}}</td>
                        <td>{{ $agenda->fechaServicio}}</td>
                        <td>{{ $agenda->descripcionServicio}}</td>
                        

                        <td>
                            <a href="{{URL::action('AgendaController@edit', $agenda->idAgenda)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="{{URL::action('AgendaController@show', $agenda->idAgenda)}}"><button class="btn btn-warning" >Reporte </button></a>
                            <a href="" data-target="#modal-delete-{{$agenda->idAgenda}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Rem.agenda.modal')
                    @endforeach
                </table>
            </div>
            {{$agendas->render()}}
        </div>
        </div>

    <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                     <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>

<a href="{{ url('/Rem') }}"><button class="btn btn-danger">Regresar</button></a>

  
@endsection
<!--Script para el calendario de citas FULLCALENDAR-->
@section('scripts')
    <script>
        $('#calendar').fullCalendar({

            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Hoy',
                month: 'Mes',
                week: 'Semana',
                day: 'Dia'
            },

            editable: true,

            events : [
                @foreach($agendaC as $agenda)
                {
                    id : '{{ $agenda->idAgenda }}',
                    title : '{{ $agenda->tipoServicio }}',
                    start : '{{ $agenda->fechaServicio }}',
                    end : '{{ $agenda->fechaServicio }}',
                    color:'{{ $agenda->color }}'
                    

                },
                @endforeach
            ],

            dayClick: function(date, jsEvent, view, resourceObj) {

                $("#fechaServicio").val(date.format());
                $("#ingrAgenda").modal();
            },

            eventClick: function(calEvent, jsEvent, view) {

                $('#titleAgenda').html(calEvent.title);
                $('#idAgenda').val(calEvent.id);
                id= calEvent.id;

                fechaServicio= calEvent.start._i.split(" ");
                $('#fechaServicio').val(fechaServicio[0]);
                $('#horaServicio').val(horaServicio[1]);
                $('#tipoServicio').val(calEvent.tipoServicioAgenda);
                $('#descripcionServicio').val(calEvent.descripcionServicioAgenda);
                $('#tipoServicioAgenda').val(calEvent.title);
                $('#infoAgenda').modal();
            },
        });
    </script>
@endsection

