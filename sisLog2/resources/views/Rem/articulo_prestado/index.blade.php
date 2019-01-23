@extends ('layouts.administrador')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Articulos <a href="articulo_prestado/create"><button class="btn btn-success">Mas Articulos</button></a></h3>
          
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        
                        <th>Articulo</th>
                        <th>Cantidad</th>
                        <th>Opciones</th>
                        

                    </thead>

                    @foreach ($articulo_prestado as $artpre)
                    <tr>
                        
                        <td>{{ $artpre->tipoArticulo}}</td>
                        <td>{{ $artpre->canArt}}</td>
                        
                        <td>
                            <a href="{{URL::action('Articulo_prestadoController@edit', $artpre->idArtPre)}}"><button class="btn btn-info">Editar</button></a>
                            
                            <a href="" data-target="#modal-delete-{{$artpre->idArtPre}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    
                    @endforeach
                </table>
            </div>
            {{$articulo_prestado->render()}}
            <hr>
            &nbsp
            <a href="{{ url('/seguridad') }}"><button class="btn btn-danger">Menu principal</button></a>
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