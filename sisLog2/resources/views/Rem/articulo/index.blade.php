@extends ('layouts.administrador')
@section ('contenido')
    

    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Articulos <a href="articulo/create"><button class="btn btn-success">Nuevo Articulo</button></a></h3>
            @include('Rem.articulo.search')
        </div>
    </div>


    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Tipo de Articulo</th>
                        <th>Modelo</th>
                        <th>Fabricante</th>
                        <th>Cantidad</th>
                        <th>Altura</th>
                        <th>Dimensiones</th>
                        <th>Opciones</th>
                    </thead>
                    @foreach ($articulo as $art)
                    <tr>
                        <td>{{ $art->idArticulo}}</td>
                        <td>{{ $art->tipoArticulo}}</td>
                        <td>{{ $art->modelo}}</td>
                        <td>{{ $art->fabricante}}</td>
                        <td>{{ $art->cantidad}}</td>
                        <td>{{ $art->altura}}</td>
                        <td>{{ $art->dimensiones}}</td>
                        
                        <td>
                            <a href="{{URL::action('ArticuloController@edit', $art->idArticulo)}}"><button class="btn btn-info">Editar</button></a>
                            
                            <a href="" data-target="#modal-delete-{{$art->idArticulo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                        </td>
                    </tr>
                    @include('Rem.articulo.modal')
                    @endforeach
                </table>
            </div>
            {{$articulo->render()}}
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