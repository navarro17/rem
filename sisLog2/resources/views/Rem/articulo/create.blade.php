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

            {!!Form::open(array('url'=>'Rem/articulo','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

        

            <div class="form-group">
                <label for="altura" class="required">Altura</label>
                <input type="text" value="{{old('altura')}}" name="altura" class="form-control" placeholder="altura en metros...">    
            </div>
             <div class="form-group">
                <label for="cantidad" class="required">Cantidad</label>
                <input type="text" value="{{old('cantidad')}}" name="cantidad" class="form-control" placeholder="cantidad...">    
            </div>
            
            <div class="form-group">
                <label for="modelo" class="required">Modelo</label>
                <textarea name="modelo" value="{{old('modelo')}}"  rows="2.5" cols="20" name="modelo" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="dimensiones" class="required">Dimensiones</label>
                <textarea name="dimensiones" value="{{old('dimensiones')}}"  rows="2.5" cols="20" name="dimensiones" class="form-control" >    
                </textarea>
            </div>
            <div class="form-group">
                <label for="fabricante" class="required">Fabricante</label>
                <textarea name="fabricante" value="{{old('fabricante')}}"  rows="2.5" cols="20" name="fabricante" class="form-control" >   
                </textarea>
            </div>
             <div class="form-group">
                <label for="tipoArticulo" class="required">Tipo de Articulo</label>
                <textarea name="tipoArticulo" value="{{old('tipoArticulo')}}"  rows="2.5" cols="20" name="tipoArticulo" class="form-control" >   
                </textarea>
            </div>
            <div class="form-group">
                <label for="montaje" class="required">Montaje</label>
                <textarea name="montaje" value="{{old('montaje')}}"  rows="2.5" cols="20" name="montaje" class="form-control" >   
                </textarea>
            </div>
             <div class="form-group">
                <label for="numeroLineas">Numero de Lineas</label>
                
                    <input type="number" name="numLineas" min="0" max="150" step="1" value="">
                
            </div>
            <div class="form-group">
                <label for="tipoLinea" class="required">Tipo de Linea</label>
                <textarea name="tipoLinea" value="{{old('tipoLinea')}}"  rows="2.5" cols="20" name="tipoLinea" class="form-control" >   
                </textarea>
            </div>

            

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!!Form::close()!!}
              
        </div>
   </div>
  <a href="{{URL::action('ArticuloController@index')}}"><button class="btn btn-info">Ver Listado de Articulos</button></a>
   
   
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

