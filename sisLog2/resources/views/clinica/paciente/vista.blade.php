<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="utf-8"/>
<title>Expediente de Paciente</title>
<style type="text/css">
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
<p align="left">hola</p>
<h1>Real Madrid</h1>

<div align="left">
  <table width="700" height="325" border="0" bordercolor="#F0F0F0" bgcolor="white">
      <th height="42" background="
" bgcolor="#FFFFFF" scope="col"><table width="700" height="250" border="0" align="center" bordercolor="#F0F0F0">
          <tr>
            <td colspan="5" bgcolor="#999999" class="Estilo9">Expediente de Paciente</td>
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
            <td class="Estilo9"><div align="left">Direccion</div></td>
            <td class="Estilo9"><div align="left">{{$paciente->direccion}}</div></td>
          </tr>
          <tr>
            <td class="Estilo9"><div align="left">Fecha Nacimiento</div></td>
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
            <td colspan="5" bgcolor="#999999" class="Estilo9">&nbsp;</td>
          </tr>
</div>
</body>
</html>