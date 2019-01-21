@extends ('layouts.admin')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Crear Nuevo Expediente de Paciente</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'clinica/paciente','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

            
            <div class="form-group">
                <label for="apellido" class="required">Apellido</label>
                <input type="text" value="{{old('apellido')}}" name="apellido" class="form-control" placeholder="Apellido...">  
            </div>
            <div class="form-group">
                <label for="nombre" class="required">Nombre</label>
                <input type="text" value="{{old('nombre')}}"name="nombre" class="form-control" placeholder="Nombre...">  
            </div>
            <div class="form-group ">
                <label for="telefono" class="required">Telefono</label>
                <input type="text" value="{{old('telefono')}}" name="telefono" class="form-control"  placeholder="Ejemplo 0000 0000" pattern="[0-9]{4}[ ]{1}[0-9]{4}" > 
                

            </div>
             
            <div class="form-group">
                <label for="direccion" class="required">Direccion</label>
                <input type="text" value="{{old('direccion')}}" name="direccion" class="form-control" placeholder="Direccion...">    
            </div>
            <div class="form-group">
                <label for="fechaNacimiento" class="required">Fecha de Nacimiento</label>
                <input type="date" value="{{old('fechaNacimiento')}}" name="fechaNacimiento" class="form-control" required="" placeholder="yyyy/mm/dd">    
            </div>
            <div class="form-group">
                <label for="tipoSangre" class="required">Tipo de Sangre</label>
                <div>
                    <select class="custom-select" name="tipoSangre" id="tipoSangre">
                    <option selected value="" >Seleccione una opcion</option>
                    <option value="O positivo">O positivo</option> 
                    <option value="O negativo">O negativo</option>
                    <option value="B RH positivo">B RH positivo</option>
                    <option value="B RH negativo">B RH negativo</option>
                    <option value="AB negativo">AB negativo</option>
                    <option value="AB positivo">AB positivo</option>
                    <option value="Negativo">Negativo</option>
                    </select>
                </div>       
            </div>
            <div class="form-group">
                <label for="sexo" class="required">Sexo</label>
                <div>
                    <select class="custom-select" name="sexo">
                    <option selected value="" >Seleccione una opcion</option>
                    <option value="Femenino">Femenino</option> 
                    <option value="Masculino">Masculino</option>
                    </select> 
                </div>   
            </div>
            <div class="form-group">
                <label for="estadoCivil" class="required">Estado Civil</label>
                <div>
                    <select class="custom-select" name="estadoCivil" >
                    <option selected value="" >Seleccione una opcion</option>
                    <option value="soltero">Soltero/a</option> 
                    <option value="casado">Casado/a</option>
                    <option value="acompanado">Acompanado/a</option>
                    <option value="viudo">Viudo/a</option>
                    <option value="divorsiado">Divorsiado/a</option>
                </select>  
                </div> 
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}

        </div>
   </div>
   <a href="{{URL::action('PacienteController@index')}}"><button class="btn btn-info">Ver Listado de Pacientes</button></a>
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