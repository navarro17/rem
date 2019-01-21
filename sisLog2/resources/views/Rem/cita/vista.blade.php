<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte de Cita</title>
    
    <style type="text/css">

      hr {
          border-color: #66BDA9;
          height: 1px;
          margin: 5px 0;
          display: block;
          clear: both;
      }

      table {
            border: #CC5A6A 1px solid;

      }

      th,tr,td{
            border: #66BDA9 1px solid;
      }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="..\public\img\Pdf.png" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Clinica Medica Betel - Reporte de Cita</font></h1>
      
      <div id="project">
        <hr>
        <div><span>Direccion:</span> Barrio el Angel, Rosario de la Paz</div>
        <div><span>Telefono:</span> 2531-2078</div>
        <div><span>Horario:</span> Lunes a viernes de 12:30 pm a 3:30 pm </div>
        <hr>
        <br><br>
        
      </div>
    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
            <th class="nombre del paciente" bgcolor="#D0D3D4">Nombre del Paciente</th>
            <th class="tipo de consulta" bgcolor="#D0D3D4">Tipo de Consulta</th>
            <th class="fecha de la cita" bgcolor="#D0D3D4">Fecha de la Cita</th>
            <th class="hora de la cita" bgcolor="#D0D3D4">Hora de la Cita</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="nombre del paciente"><div align="left">{{$cita->nombrePaciente}}</div></td>
            <td class="tipo de consulta"><div align="left"></div>{{$cita->tipoCita}}</td></td>
            <td class="fecha de la cita"><div align="left"></div>{{$cita->fechaCita}}</td></td>
            <td class="Hora de la cita"><div align="left"></div>{{$cita->horaCita}}</td></td>
            
          </tr>
          
        </tbody>
      </table>
      
    </main>
    <footer>
      <br><br>
      <hr>
      <br>
      <center>Clama a mi y yo te respondere Jeremias 33:3.</center>
    </footer>
  </body>
</html>