<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte de Servicios</title>
    
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
        <img src="..\public\img\antena.png" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Rem Redes Mobiles - Reporte de Servicio</font></h1>
      
      <div id="project">
        <hr>
        <div><span>Direccion:</span> Mejicanos,San Salvador</div>
        <div><span>Horario:</span> Lunes a viernes de 8:30 pm a 5:30 pm </div>
        <hr>
        <br><br>
        
      </div>
    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
            <th class="nombre de la empresa" bgcolor="#D0D3D4">Nombre de la Empresa</th>
            <th class="tipo de servicio" bgcolor="#D0D3D4">Tipo de servicio</th>
            <th class="descripcion del servicio" bgcolor="#D0D3D4">Descripcion del servicio</th>
            <th class="fecha y hora del servicio" bgcolor="#D0D3D4">Fecha y Hora del Servicio</th>
            
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="nombre de la empresa"><div align="left">{{$agenda->nombreEmpresa}}</div></td>
            <td class="tipo de servicio"><div align="left"></div>{{$agenda->tipoServicio}}</td></td>
            <td class="descripcion del servicio"><div align="left"></div>{{$agenda->descripcionServicio}}</td></td>
            <td class="fecha y hora del servicio"><div align="left"></div>{{$agenda->fechaServicio}}</td></td>
           
            
          </tr>
          
        </tbody>
      </table>
      
    </main>
    <footer>
      <br><br>
      <hr>
      <br>
      <center> Rem Redes Mobiles</center>
    </footer>
  </body>
</html>