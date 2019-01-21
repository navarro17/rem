@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
            <h3>Editar Consulta: {{$consulta->nombreConsulta}}</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::model($consulta,['method'=>'PATCH','route'=>['clinica.consulta.update',$consulta->idConsulta]])!!}
            {{Form::token()}}

            <div class="form-horizontal">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="fechaConsulta" class="col-sm-3 required">Fecha de la Consulta</label>
                        <div class="col-sm-8">
                            <input type="date" value="{{$consulta->fechaConsulta}}" name="fechaConsulta" class="form-control" required="" placeholder="yyyy/mm/dd">  
                        </div>     
                    </div>
                    
                    <div class="form-group">
                        <label for="tipoConsulta" class="col-sm-3 required">Tipo de Consulta </label>
                        <div class="col-sm-8">
                            <select name="tipoConsulta" id="input" class="form-control" value="{{$consulta->tipoConsulta}}">
                            <option value="">Seleccione el tipo de consulta</option>
                            <option value="consulta general" <?php if($consulta->tipoConsulta=="consulta general") echo "selected" ?>> Consulta general</option>
                            <option value="control de embarazo" <?php if($consulta->tipoConsulta=="control de embarazo") echo "selected" ?>>Control de embarazo</option>
                            <option value="control de niño" <?php if($consulta->tipoConsulta=="control de niño") echo "selected" ?>>Control de niño</option>
                            <option value="oftalmologia" <?php if($consulta->tipoConsulta=="oftalmologia") echo "selected" ?>>Oftalmologia</option>
                            <option value="dermatologia" <?php if($consulta->tipoConsulta=="dermatologia") echo "selected" ?>>Dermatologia</option>
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
                            <option value="{{$paciente ['idPaciente']}}" <?php if( ($paciente ['idPaciente'])==$consulta->idPaciente) echo "selected" ?>>{{$paciente ['nombre']}}
                            </option>
                        @endforeach 
                        </select>
                        </div>  
                    </div>

                    <div class="form-group">
                        <label for="edadPaciente" class=" col-sm-3 required">Edad Paciente </label>
                        <div class="col-sm-8">
                            <input type="number" name="edadPaciente" min="0" max="150" step="1" value="{{$consulta->edadPaciente}}">
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
                        <textarea name="nombreConsulta" value="{{$consulta->nombreConsulta}}"  rows="2.5" cols="20" name="nombreConsulta" class="form-control">{{$consulta->nombreConsulta}}    
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="pesoPaciente" class="col-sm-3" >Peso</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$consulta->pesoPaciente}}" name="pesoPaciente" class="form-control" placeholder="">  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alturaPaciente" class="col-sm-3">Altura</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$consulta->alturaPaciente}}" name="alturaPaciente" class="form-control" placeholder=""> 
                        </div>
                    </div>
                    
                </div>

                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="medPaciente" class="col-sm-3" >Medicamentos prescritos</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$consulta->medPaciente}}" name="medPaciente" class="form-control" placeholder="medicamentos prescritos anteriormente...">  
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alergiasPaciente" class="col-sm-3">Alergias</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$consulta->alergiasPaciente}}" name="alergiasPaciente" class="form-control" placeholder="Alergias del paciente...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="temPaciente" class="col-sm-3">Temperatura</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$consulta->temPaciente}}" name="temPaciente" class="form-control" placeholder="Temperatura del paciente..."> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="presionArtPaciente" class="col-sm-3">Presion arterial</label>
                        <div class="col-sm-8">
                            <input type="text" value="{{$consulta->presionArtPaciente}}" name="presionArtPaciente" class="form-control" placeholder="Presion del paciente..."> 
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
                            <option value="{{$medico ['idMedico']}}" <?php if( ($medico['idMedico'])==$consulta->idMedico) echo "selected" ?>>{{$medico ['nombre']}}
                            </option>
                            @endforeach 
                        </select>
                    </div>
                    
                </div>
                <div class="form-group ">
                    <label for="examenFisico" class=" col-sm-3 required">examenFisico</label>
                    <div class="col-sm-8">
                        <textarea name="examenFisico" value="{{$consulta->examenFisico}}"  rows="3" cols="30" name="examenFisico" class="form-control">{{$consulta->examenFisico}}    
                    </textarea> 
                    </div>
                    
                </div>
            </div>

            <div class="col-sm-6">
                <div class="form-group ">
                    <label for="diagnostico" class=" col-sm-3 required">Diagnostico</label>
                    <div class="col-sm-8">
                        <textarea name="diagnostico" value="{{$consulta->diagnostico}}"  rows="6" cols="30" name="diagnostico" class="form-control">{{$consulta->diagnostico}}    
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
   <a href="{{URL::action('ConsultaController@index')}}"><button class="btn btn-info">Ver Listado de Pacientes</button></a>
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