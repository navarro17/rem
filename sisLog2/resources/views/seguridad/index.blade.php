@extends ('layouts.administrador')
@section ('contenido')
    
    
    <div class="row">
        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/usuario.JPG')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Usuarios</h3></center><center><a href="seguridad/usuario"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>


        <div class="col-lg-4">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <center>
            <img src="{{asset('img/doctor.PNG')}}" alt="Generic placeholder image" width="140" height="140">
            </center>
            <center><h3>Gestion de Medicos</h3></center><br><center><a href="clinica/medico"><button class="btn btn-success">Entrar</button></a></center>
        </div>
        </div>
    </div>

@endsection