@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
            <h3>Crear Nueva Consulta</h3>
            <hr>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'clinica/consulta','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
    <div class="form-horizontal">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="fechaConsulta" class="col-sm-3 required">Fecha de la Consulta</label>
                <div class="col-sm-8">
                    <input type="date" value="{{old('fechaConsulta')}}" name="fechaConsulta" class="form-control" required="" placeholder="yyyy/mm/dd">  
                </div>     
            </div>
            
            <div class="form-group">
                <label for="tipoConsulta" class="col-sm-3 required">Tipo de Consulta </label>
                <div class="col-sm-8">
                    <select name="tipoConsulta" id="input" class="form-control" value="{{ old('tipoConsulta') }}">
                    <option value="">Seleccione el tipo de consulta</option>
                    <option value="consulta general"> Consulta general</option>
                    <option value="Control Embarazo">Control Embarazo</option>
                    <option value="control de niño">Control de niño</option>
                    <option value="oftalmologia">Oftalmologia</option>
                    <option value="dermatologia">Dermatologia</option>
                </select>
                </div>
            </div>  
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="idPaciente" class="col-sm-3 required">Nombre del Paciente </label>
                <div class="col-sm-8">
                    <select name= "idPaciente" id="idPaciente" class="form-control">
                <option selected value="" >Seleccione una opcion</option>
                @foreach ($paciente as $paciente)
                    <option value="{{$paciente ['idPaciente']}}">{{$paciente ['nombre']}}
                    </option>
                @endforeach 
                </select>
                </div>  
            </div>

            <div class="form-group">
                <label for="edadPaciente" class=" col-sm-3 required">Edad Paciente </label>
                <div class="col-sm-8">
                    <input type="number" name="edadPaciente" min="0" max="150" step="1" value="">
                </div>
            </div>
        </div>
    </div>
<hr>


<h4>Historia Clinica</h4>
<hr>
    <div class="form-horizontal">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="nombreConsulta" class="required">Razon de la Consulta</label>
                <textarea name="nombreConsulta" value="{{old('nombreConsulta')}}"  rows="2.5" cols="20" name="nombreConsulta" class="form-control">    
                </textarea>
            </div>
            <div class="form-group">
                <label for="pesoPaciente" class="col-sm-3" >Peso</label>
                <div class="col-sm-8">
                    <input type="text" value="{{old('pesoPaciente')}}" name="pesoPaciente" class="form-control" placeholder="">  
                </div>
            </div>
            <div class="form-group">
                <label for="alturaPaciente" class="col-sm-3">Altura</label>
                <div class="col-sm-8">
                    <input type="text" value="{{old('alturaPaciente')}}" name="alturaPaciente" class="form-control" placeholder=""> 
                </div>
            </div>
            
        </div>

        <div class="col-sm-6">
            <div class="form-group">
                <label for="medPaciente" class="col-sm-3" >Medicamentos prescritos</label>
                <div class="col-sm-8">
                    <input type="text" value="{{old('medPaciente')}}" name="medPaciente" class="form-control" placeholder="medicamentos prescritos anteriormente...">  
                </div>
            </div>
            <div class="form-group">
                <label for="alergiasPaciente" class="col-sm-3">Alergias</label>
                <div class="col-sm-8">
                    <input type="text" value="{{old('alergiasPaciente')}}" name="alergiasPaciente" class="form-control" placeholder="alergias del paciente..."> 
                </div>
            </div>
            <div class="form-group">
                <label for="temPaciente" class="col-sm-3">Temperatura</label>
                <div class="col-sm-8">
                    <input type="text" value="{{old('temPaciente')}}" name="temPaciente" class="form-control" placeholder="Temperatura del paciente..."> 
                </div>
            </div>
            <div class="form-group">
                <label for="presionArtPaciente" class="col-sm-3">Presion arterial</label>
                <div class="col-sm-8">
                    <input type="text" value="{{old('presionArtPaciente')}}" name="presionArtPaciente" class="form-control" placeholder="Presion del paciente..."> 
                </div>
            </div>
        </div>
        
    </div>
<HR>
<h4>Resultados</h4>
<hr>        
            
        <div class="form-horizontal">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="idMedico" class=" col-sm-3 required">Nombre del Medico </label>
                    <div class="col-sm-8">
                        <select name= "idMedico" id="idMedico" class="form-control">
                        <option selected value="" >Seleccione una opcion</option>
                            @foreach ($medico as $medico)
                            <option value="{{$medico ['idMedico']}}">{{$medico ['nombre']}}
                            </option>
                            @endforeach 
                        </select>
                    </div>
                    
                </div>
                <div class="form-group ">
                    <label for="examenFisico" class=" col-sm-3 required">examenFisico</label>
                    <div class="col-sm-8">
                        <textarea name="examenFisico" value="{{old('examenFisico')}}"  rows="3" cols="30" name="examenFisico" class="form-control">    
                    </textarea> 
                    </div>
                    
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group ">
                    <label for="diagnostico" class=" col-sm-3 required">Diagnostico</label>
                    <div class="col-sm-8">
                        <textarea name="diagnostico" value="{{old('diagnostico')}}"  rows="6" cols="30" name="diagnostico" class="form-control">    
                    </textarea> 
                    </div>
                    
                </div>
            </div>
            
        </div>   
       
        



            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>

                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}

        </div>
   </div>
   <a href="{{URL::action('CitaController@create')}}"><button class="btn btn-success">Cita</button></a>
   <a href="{{URL::action('ConsultaController@index')}}"><button class="btn btn-info">Ver Listado de Consultas</button>
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
        swal("Error", "En el Procesamiento", "warning");
         

        //Puedes colocar warning, error, success y por último info.
    </script>
</body>
</html>
@endif