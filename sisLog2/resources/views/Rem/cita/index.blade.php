@extends ('layouts.admin')

@section ('contenido')

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Control de Citas <a href="cita/create"><button class="btn btn-success">Nuevo</button></a></h3>
    @include('clinica.cita.search')
        </div>
    </div>

        <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nombre paciente</th>
                        <th>Tipo consulta</th>
                    </thead
                    @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->id}}</td>
                        <td>{{ $cita->nombrePaciente}}</td>
                        <td>{{ $cita->tipoCita}}</td>

                        <td>
                            <a href="{{URL::action('CitaController@edit', $cita->id)}}"><button class="btn btn-info">Editar</button></a>
                            <a href="{{URL::action('CitaController@show', $cita->id)}}"><button class="btn btn-warning" >Reporte</button></a>
                            <a href="" data-target="#modal-delete-{{$cita->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('clinica.cita.modal')
                    @endforeach
                </table>
            </div>
            {{$citas->render()}}
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

<a href="{{ url('/clinica') }}"><button class="btn btn-danger">Regresar</button></a>

<!--Model Para ingresar una cita-->
{!!Form::open(array('action'=>array('CitaController@store'),'method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
    <div class="modal" tabindex="-1" role="dialog" id="ingrCita">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Ingresar Cita</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                        <div class="form-group">
                <label for="nombrePaciente" class="required">Nombre del Paciente</label>
                <input type="text" value="{{old('nombrePaciente')}}"name="nombrePaciente" class="form-control" placeholder="Nombre Paciente...">  
            </div>
            <!-- Seleccion de Medico   -->
            <div class="form-group">
                <label for="nombreMedico" class="required">Nombre del Medico</label>
                <select name="nombreMedico" id="input" class="form-control" value="{{old('nombreMedico')}}">
                    <option value="">Seleccione el medico</option>
                    @foreach ($medicos as $medico)
                    <!-- valor de value es por el id del medico  y muestra el nombre del medico-->
                        <option value="{{ $medico['idMedico'] }}"> {{ $medico['nombre'] }}</option>
                    @endforeach
                </select>
  
            </div>
            <div class="form-group">
                <label for="fechaCita" class="required">Fecha de la Cita</label>
                <input type="date" name="fechaCita" class="form-control" id="fechaCita">    
            </div>
            <div class="form-group">
                <label for="horaCita" class="required">Hora de la Cita</label>
                <input type="time" value="{{old('horaCita')}}" name="horaCita" class="form-control" placeholder="00:00:00">   
            </div>

            <div class="form-group">
                <label for="tipoCita" class="required">Tipo de Consulta</label>
                <select name="tipoCita" id="input" class="form-control" value="{{ old('tipoCita') }}">
                    <option value="">Seleccione el tipo de consulta</option>
                    <option value="consulta general"> Consulta general</option>
                    <option value="control de embarazo">Control de embarazo</option>
                    <option value="control de niño">Control de niño</option>
                    <option value="oftalmologia">Oftalmologia</option>
                    <option value="dermatologia">Dermatologia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reservacionCita" class="required">Reservar cita</label>
                <br>
                <input type="radio" name="reservacionCita" value="1">Si<br>
                <input type="radio" name="reservacionCita" value="0">No <br>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        </div>
        </div>
    </div>  
{!!Form::close()!!}

<!--Model de informacion de la cita-->
{!!Form::open(array('action'=>array('CitaController@store'),'method'=>'POST','autocomplete'=>'off'))!!}
{{Form::token()}}
<div class="modal" tabindex="-1" role="dialog" id="infoCita">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="titleCita"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 
        <label>id cita</label>
        <input type="text" name="" id="idCita" disabled></input>

            <div class="form-group">
                <label for="nombrePaciente" class="required">Nombre del Paciente</label>
                <input type="text" name="nombrePaciente" class="form-control" id="nombrePaciente" disabled >  
            </div>
            <!-- Seleccion de Medico   -->
            <div class="form-group">
                <label for="nombreMedico" class="required">Nombre del Medico</label>
                <select name="nombreMedico" id="nombreMedico" class="form-control" >
                    <option value="">Seleccione el medico</option>
                    @foreach ($medicos as $medico)
                    <!-- valor de value es por el id del medico  y muestra el nombre del medico-->
                        <option value="{{ $medico['idMedico'] }}"> {{ $medico['nombre'] }}</option>
                    @endforeach
                </select>
  
            </div>
            <div class="form-group">
                <label for="fechaCita" class="required">Fecha de la Cita</label>
                <input type="date" name="fechaCita" class="form-control" id="fechaCita">    
            </div>
            <div class="form-group">
                <label for="horaCita" class="required">Hora de la Cita</label>
                <input type="time"  name="horaCita" class="form-control"  id="horaCita">   
            </div>

            <div class="form-group">
                <label for="tipoCita" class="required">Tipo de Consulta</label>
                <select name="tipoCita" id="tipoCita" class="form-control" disabled >
                    <option value="">Seleccione el tipo de consulta</option>
                    <option value="consulta general"> Consulta general</option>
                    <option value="control de embarazo">Control de embarazo</option>
                    <option value="control de niño">Control de niño</option>
                    <option value="oftalmologia">Oftalmologia</option>
                    <option value="dermatologia">Dermatologia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="reservacionCita" class="required">Reservar cita</label>
                <br>
                <input type="radio" name="reservacionCita" value="1">Si<br>
                <input type="radio" name="reservacionCita" value="0">No <br>
            </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="{{URL::action('CitaController@destroy', 'id')}}"><button class="btn btn-danger">Eliminar</button></a>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
    
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
                @foreach($citaC as $cita)
                {
                    id : '{{ $cita->id }}',
                    title : '{{ $cita->tipoCita }}',
                    medicoCita : '{{ $cita->nombreMedico }}',
                    pacienteCita : '{{ $cita->nombrePaciente }}',
                    start : '{{ $cita->fechaCita }}',
                    end : '{{ $cita->fechaCita }}',
                    color:'{{ $cita->color }}'
                    

                },
                @endforeach
            ],

            dayClick: function(date, jsEvent, view, resourceObj) {

                $("#fechaCita").val(date.format());
                $("#ingrCita").modal();
            },

            eventClick: function(calEvent, jsEvent, view) {

                $('#titleCita').html(calEvent.title);
                $('#idCita').val(calEvent.id);
                id= calEvent.id;

                fechacita= calEvent.start._i.split(" ");
                $('#fechaCita').val(fechaCita[0]);
                $('#horaCita').val(fechaCita[1]);
                $('#nombrePaciente').val(calEvent.pacienteCita);
                $('#nombreMedico').val(calEvent.medicoCita);
                $('#tipoCita').val(calEvent.title);
                $('#infoCita').modal();
            },
        });
    </script>
@endsection

