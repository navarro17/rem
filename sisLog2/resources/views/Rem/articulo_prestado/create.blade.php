@extends ('layouts.administrador')
@section ('contenido')
   <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
            <h3>Agregar un nuevo Articulo</h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach 
                </ul>   
            </div>
            @endif

            {!!Form::open(array('url'=>'Rem/articulo_prestado','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

             <div class="form-group">
            <label for="idPrestamo">Prestado a:</label>  
            <select name ="idPrestamo" id="input" class="form-control" value="{{old('idPrestamo')}}">
                <option value="">--Escoja el prestario--</option>>
             @foreach($prestamos as $prestamo)
                <option value="{{$prestamo['idPrestamo']}}"> {{$prestamo['nomtec']}}
                </option>
             @endforeach 
             </select>
             </div>


            <div class="form-group">
            <label for="idArticulo">Articulo</label>  
            <select name ="idArticulo" id="input" class="form-control" value="{{old('idArticulo')}}">
                <option value="">--Escoja el Articulo--</option>>
             @foreach($articulos as $articulo)
                <option value="{{$articulo['idArticulo']}}"> {{$articulo['tipoArticulo']}}
                </option>
             @endforeach 
             </select>
             </div>

        

            <div class="form-group">
                <label for="canArt" class="required">Cantidad</label>
                <input type="text" value="{{old('cantArt')}}" name="cantArt" class="form-control" placeholder="digite la cantidad a prestar...">    
            </div>
             
            

            

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
              
        </div>
   </div>
  <a href="{{URL::action('Articulo_prestadoController@index')}}"><button class="btn btn-info">Ver Listado de Articulos</button></a>
   
   
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
