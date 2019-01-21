<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="utf-8"/>
<title>Expediente de Paciente</title>
<style type="text/css">
hr {
          border-color: #66BDA9;
          height: 1px;
          margin: 5px 0;
          display: block;
          clear: both;
      }
.Estilo11 {font-weight: bold}
<!--
body {
	background-image: url();
}
.Estilo9 {color: 1}
.Estilo10 {font-size: 9px}
.Estilo11 {font-weight: bold}
-->
</style></head>

<body>


<h1 align="center"><font color="#66BDA9">Clinica Medica Betel - Expediente de Paciente</font></h1>
<hr>
      
      <div id="project">
        <div><span>Direccion:</span> Barrio el Angel, Rosario de la Paz</div>
        <div><span>Telefono:</span> 2531-2078</div>
        <div><span>Horario: </span> Lunes a viernes de 12:30 pm a 3:30 pm </div>
        <hr>

<div align="left">
  <table width="540" height="230" border="0" bordercolor="#F0F0F0" bgcolor="white">
      <th height="42" background="
" bgcolor="#FFFFFF" scope="col">
<table width="540" height="230" border="0" align="center" bordercolor="#F0F0F0">
          <tr>
            <td colspan="5" bgcolor="skyblue" class="Estilo11">Expediente de Paciente</td>
          </tr>
          <tr>
            <th class="Estilo9" scope="col"><div align="left">Apellido:</div></th>
            <th class="Estilo9" scope="col"><div align="left">{{$paciente->apellido}}</div></th>
          </tr>
          <tr>
            <td class="Estilo9"><div align="left">Nombre:</div></td>
            <td class="Estilo9"><div align="left">{{$paciente->nombre}}</div></td>
          </tr>
          <tr>
            <td class="Estilo9"><div align="left">Telefono:</div></td>
            <td class="Estilo9"><div align="left"></div>{{$paciente->telefono}}</td>
          </tr>
          <tr>
            <td class="Estilo9"><div align="left">Direccion:</div></td>
            <td class="Estilo9"><div align="left">{{$paciente->direccion}}</div></td>
          </tr>
          <tr>
            <td class="Estilo9"><div align="left">Fecha Nacimiento:</div></td>
            <td class="Estilo9"><div align="left">{{$paciente->fechaNacimiento}}</div></td>
            </tr>
          <tr>
            <td class="Estilo9"><div align="left">Tipo de Sangre:</div></td>
            <td class="Estilo9"><div align="left">{{$paciente->tipoSangre}}</div></td>
            </tr>
          <tr>
            <td class="Estilo9"><div align="left">Sexo:</div></td>
            <td class="Estilo9"><div align="left">{{$paciente->sexo}}</div></td>
            </tr>
          <tr>
            <td class="Estilo9"><div align="left">Estado Civil:</div></td>
            <td class="Estilo9"><div align="left">{{$paciente->estadoCivil}}</div></td>
            </tr>
        
          <tr>
            <td colspan="5" bgcolor="skyblue" class="Estilo9">&nbsp;</td>
          </tr>
          </table>
          </th>
          </table>

          <hr>

          <footer>
          <center>Clama a mi y yo te respondere Jeremias 33:3.</center>         
          </footer>
</div>
</body>
</html>