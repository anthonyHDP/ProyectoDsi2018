
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reporte Clinica Medica Genesis</title>
    
    <style type="text/css">

      hr {
          border-color: #66BDA9;
          height: 1px;
          margin: 5px 0;
          display: block;
          clear: both;
      }

      table {
            /*border: #CC5A6A 1px solid;*/

      }

      th,tr,td{
            /*border: #66BDA9 1px solid;*/
      }

    </style>
  </head>
  <body>
    <header class="clearfix">
      <div id="logo">
        <img src="..\public\img\2695.png" width="100" height="100">
      </div>
      <h1 align="center"><font color="#66BDA9">Clinica Medica Genesis - Reporte de Expedientes de Pacientes</font></h1>
      <h4 align="center">Fecha Inicial: 01/10/2019</h4>
      <h4 align="center">Fecha Final: 30/11/2019</h4>
    
      
      <br><br><br><br>


    </header>
    <main>
      <table align="center" >
        <thead>
          <tr>
            
            <th class="Paciente" bgcolor="#D0D3D4">No.</th>
            <th class="Paciente" bgcolor="#D0D3D4">Apellido</th>
            <th class="Paciente" bgcolor="#D0D3D4">Nombre</th>
            <th class="Paciente" bgcolor="#D0D3D4">Telefono</th>
            <th class="Paciente" bgcolor="#D0D3D4">Direccion</th>
            <th class="Paciente" bgcolor="#D0D3D4">tipo Sangre</th>
            <th class="Paciente" bgcolor="#D0D3D4">sexo</th>
            <th class="Paciente" bgcolor="#D0D3D4">estado Civil</th>
            
          </tr>

        </thead>
        <tbody>

          <?php

            use sisLog2\Paciente;
          ?>
      
            @foreach ($anys as $any)
         <tbody>
          <tr>
        <?php
                        $paci=Paciente::findOrFail($any->idPaciente);
                        ?>
                        <td class="Infactible"><div align="left">{{ $paci->idPaciente}}</td>
                        <td class="Infactible"><div align="left">{{ $paci->apellido}}</td>
                        <td class="Infactible"><div align="left">{{ $paci->nombre}}</td>
                        <td class="Infactible"><div align="left">{{ $paci->telefono}}</td>
                        <td class="Infactible"><div align="left">{{ $paci->direccion}}</td>
                        <td class="Infactible"><div align="left">{{ $paci->tipoSangre}}</td>
                        <td class="Infactible"><div align="left">{{ $paci->sexo}}</td>
                        <td class="Infactible"><div align="left">{{ $paci->estadoCivil}}</td>
           
           
         </tbody>
        </tr>
          </tbody>      
  @endforeach



      </table>
      
    </main>
    <footer>
      <br><br>
      <hr>
      <br>
      <center>Reporte de Apoyo para el nivel Operativo de la Clinica Medica Genesis</center>
    </footer>
  </body>
</html>


                       
                        
                        