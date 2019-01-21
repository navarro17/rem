<html lang="es">
  <head>
    <meta charset="utf-8">
    <title>Receta Medica</title>
    <link rel="stylesheet" href="receta.css" media="all" />
    <?php 
        use sisLog2\Medico;
        use sisLog2\Paciente;

        $medico=Medico::findOrFail($receta->idMedico);
        $paciente=Paciente::findOrFail($receta->idPaciente);

        function obtener_edad_fecha_nacimiento($fecha_nac){
        $fecha_nac = strtotime($fecha_nac);
        $edad = date('Y', $fecha_nac);
        if (($mes = (date('m') - date('m', $fecha_nac))) < 0) {
        $edad++;
        } elseif ($mes == 0 && date('d') - date('d', $fecha_nac) < 0) {
         $edad++;
         }
         return date('Y') - $edad;
        }

    ?>
        
  </head>
  <body>
    <header class="clearfix">
      <div id="luck">
        <div class="columna">
          <div id="logo">
            <img src="clinica.PNG">
          </div>
        </div>

        <div class="columna" id="c2">
          <br>
          <br>
          <div>Barrio El Angel</div>
          <div>Frente de Anda</div>
          <div>Rosario La paz</div>
        </div>

        <div class="columna" id="c3">
          <center><div><h2>{{$medico->nombre}}</h2></div></center>
          <center><div>Doctor@ en Medicina Adultos y Niños</div></center>
          <center><div>JVPM 8759</div></center>
          <center><div>Tel:2531-2078 &nbsp;&nbsp; Cel:{{$medico->telefono}}</div></center>
        </div>

        <div class="columna">
          <div id="simb">
            <center><img src="simbolo.JPG"></center>
            <center><div>Lunes a Viernes</div></center>
            <center><div>12:30 p.m  -  3:30 p.m</div></center>
          </div>
        </div>

      </div>


      <h1>CLINICA MEDICA BETEL</h1>
      
      <div id="project">
        <br>
        <div><span>Paciente</span>{{$receta->nombrePaciente}}</div>
        <div><span>Edad</span>
          <?php echo obtener_edad_fecha_nacimiento($paciente->fechaNacimiento); ?>
        </div>
        <div><span>Sexo</span>{{$paciente->sexo}}</div>
        <div><span>Fecha</span>{{$receta->fecha}}</div>
      </div>

    </header>
    <hr>
    <h3>RP.</h3>
    <main>
      <table>
        <thead>
          <tr>
            <th class="service">Medicamentos</th>
            <th class="desc">Indicaciones</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service" width="50%" height="250">{{$receta->medicamentos}}</td>
            <td class="desc" width="50%" height="250">{{$receta->indicaciones}}</td>
            
          </tr>
          
        </tbody>
      </table>
      <hr>
      <br>
      <br>
      <br>
      <br>
      <br>

      <div id="notices">
        <div></div>
        <div class="notice">Proxima Cita:_______________________________________&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Firma:_____________________</div>
      </div>
    </main>
    <footer>
      <div id="notices">
        <div>Clama a mi y yo te respondere        Jeremias 33:3</div>
      </div>
    </footer>
  </body>